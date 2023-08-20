<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backend\RoleManagement\PermissionCategory;

class PermissionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        PermissionCategory::factory()
//            ->count(5)
//            ->create();

        PermissionCategory::insert([
            [
                'id' => 1,
                'name'  => 'Dashboard',
                'slug'  => 'Dashboard',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 2,
                'name'  => 'Permission Module',
                'slug'  => 'permission-module',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 3,
                'name'  => 'Role Module',
                'slug'  => 'role-module',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 4,
                'name'  => 'Course Module',
                'slug'  => 'course-module',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 5,
                'name'  => 'Question Module',
                'slug'  => 'question-module',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 6,
                'name'  => 'Blog Module',
                'slug'  => 'blog-module',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 7,
                'name'  => 'Product Module',
                'slug'  => 'product-module',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 8,
                'name'  => 'Job Circular Module',
                'slug'  => 'job-circular-module',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 9,
                'name'  => 'Notice Module',
                'slug'  => 'notice-module',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 10,
                'name'  => 'Model Test Module',
                'slug'  => 'model-test-module',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 11,
                'name'  => 'Order Module',
                'slug'  => 'order-module',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 12,
                'name'  => 'User Module',
                'slug'  => 'user-module',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 13,
                'name'  => 'Payment Module',
                'slug'  => 'payment-module',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 14,
                'name'  => 'Page Module',
                'slug'  => 'page-module',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 15,
                'name'  => 'Contact Module',
                'slug'  => 'contact-module',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 16,
                'name'  => 'Advertisement Module',
                'slug'  => 'advertisement-module',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 17,
                'name'  => 'Gallery Module',
                'slug'  => 'gallery-module',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 18,
                'name'  => 'Information Module',
                'slug'  => 'information-module',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 19,
                'name'  => 'Affiliation Module',
                'slug'  => 'affiliation-module',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 20,
                'name'  => 'Notification Module',
                'slug'  => 'notification-module',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 21,
                'name'  => 'Enroll Module',
                'slug'  => 'enroll-module',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
        ]);
    }
}
