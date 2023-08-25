<?php


namespace App\helper;


use App\Models\Backend\Course\CourseClassExamResult;
use App\Models\Backend\ExamManagement\ExamOrder;
use App\Models\Backend\ExamManagement\SubscriptionOrder;
use App\Models\Backend\OrderManagement\ParentOrder;
use App\Models\Frontend\CourseOrder\CourseOrder;
use Illuminate\Support\Carbon;

class ViewHelper
{
    protected static $loggedUser, $courseOrder, $examOrder,$examOrders = [], $subscriptionPackage, $subscriptionOrder, $status = 'false';

    public static function checkViewForApi ($data=[], $viewPath = null, $jsonErrorMessage = null)
    {
        if (str()->contains(url()->current(), '/api/'))
        {
            if (str()->contains(url()->current(), '/v1/'))
            {
                if (empty($data))
                {
                    return response()->json(isset($jsonErrorMessage) ? $jsonErrorMessage : 'Something went wrong. Please try again.', 400);
                }
                return response()->json($data, 200);
            }
        } else {

            return view($viewPath, $data);
        }
    }

    public static function returEexceptionError ($message = null)
    {
        if (str()->contains(url()->current(), '/api/'))
        {
            return response()->json(['error' => $message], 400);
        } else {
            return back()->with('error', $message);
        }
    }

    public static function checkIfCourseIsEnrolled($course)
    {
        if (auth()->check())
        {
            self::$loggedUser = auth()->user();
            self::$courseOrder = ParentOrder::where(['user_id' => self::$loggedUser->id, 'ordered_for' => 'course'])->where('parent_model_id', $course->id)->first();
            if (!empty(self::$courseOrder))
            {
                if (self::$courseOrder->status == 'pending')
                {
                    return 'pending';
                } elseif (self::$courseOrder->status == 'approved')
                {
                    return self::$status = 'true';
                }
            } else {
                return self::$status = 'false';
            }
        }
        return self::$status = 'false';
    }

    public static function checkIfExamCategoryIsEnrolled($examCategory = null)
    {
        if (auth()->check())
        {
            self::$loggedUser = auth()->user();
            if (!empty(self::$loggedUser->examSubscriptionPackages))
            {
                foreach (self::$loggedUser->examSubscriptionPackages as $examSubscriptionPackage)
                {
                    if ($examSubscriptionPackage->valid_to >= Carbon::today()->format('Y-m-d'))
                    {
                        self::$status = 'true';
                    }
                }
                if (self::$status == 'false')
                {
                    self::$status = self::checkUserExamOrderEnrollment(self::$loggedUser, $examCategory);
                }
            } else
            {
                self::$status = self::checkUserExamOrderEnrollment(self::$loggedUser, $examCategory);
            }
            return self::$status;
        } else {
            return 'false';
        }
    }

    public static function checkUserBatchExamIsEnrollment ($loggedUser, $exam)
    {
        if (auth()->check())
        {
            if (!empty($loggedUser->parentOrders))
            {
                self::$examOrder = ParentOrder::where([ 'user_id' => $loggedUser->id, 'ordered_for' => 'batch_exam', 'parent_model_id' => $exam->id])->first();
                if (!empty(self::$examOrder))
                {
                    if (self::$examOrder->status == 'approved')
                    {
                        return self::$status = 'true';
                    } elseif (self::$examOrder->status == 'pending')
                    {
                        return self::$status = 'pending';
                    }

                }
            }
        }
        return self::$status = 'false';
    }

    public static function checkIfBatchExamIsEnrollmentAndHasValidity ($loggedUser, $batchExam)
    {
        if (!empty($loggedUser->parentOrders))
        {
            self::$examOrders = ParentOrder::where(['ordered_for' => 'batch_exam', 'parent_model_id' => $batchExam->id, 'user_id' => $loggedUser->id])->get();
//            return self::$examOrder = ParentOrder::where('ordered_for' , 'batch_exam')->where('parent_model_id' , $batchExam->id)->where('user_id' , $loggedUser->id)->first();
            if (isset(self::$examOrders))
            {
                foreach (self::$examOrders as $examOrder)
                {
                    $expireDate = $examOrder->updated_at->addDays($examOrder->batchExamSubscription->package_duration_in_days);
                    if (Carbon::parse($expireDate)->format('Y-m-d H:i') > Carbon::now()->format('Y-m-d H:i'))
                    {
                        if ($examOrder->status == 'approved')
                        {
                            return self::$status = 'true';
                        } elseif ($examOrder->status == 'pending')
                        {
                            return self::$status = 'pending';
                        }
                    }
                }
            }
        }
        return self::$status = 'false';
    }

    public static function checkIfUserHasValidSubscription ()
    {
        self::$loggedUser = auth()->user();
        if (!empty(self::$loggedUser->subscriptionOrders))
        {
            foreach (self::$loggedUser->subscriptionOrders as $subscriptionOrder)
            {
                if ($subscriptionOrder->examSubscriptionPackage->valid_to > Carbon::today()->format('d-m-Y'))
                {
                    self::$status = 'true';
                    break;
                }
            }
        }
        return self::$status;
    }

    public static function checkIfSubscriptionIsPurchased($subscription)
    {
        if (auth()->check())
        {
            self::$loggedUser = auth()->user();
            if (isset($subscription))
            {
                self::$subscriptionOrder = SubscriptionOrder::where(['exam_subscription_package_id' => $subscription->id, 'user_id' => self::$loggedUser->id])->first();
                if (!empty(self::$subscriptionOrder))
                {
                    return self::$status = 'true';
                }
            }
        } else {
            return self::$status = 'false';
        }
        return self::$status;
    }

    public static function checkClassXmStatus($courseSectionContent)
    {
        $userExistClassXm = CourseClassExamResult::where(['course_section_content_id' => $courseSectionContent->id, 'user_id' => auth()->id()])->first();
        if (isset($userExistClassXm))
        {
            if ($userExistClassXm->status == 'pass')
            {
                return '1';
            } else {
                return '0';
            }
        } else {
            return '0';
        }
    }
}
