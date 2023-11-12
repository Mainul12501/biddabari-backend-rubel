<?php

namespace App\Models\Backend\AdditionalFeatureManagement\Affiliation;

use App\Models\Scopes\Searchable;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AffiliationRegistration extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'affiliate_code',
        'total_earning',
        'total_withdraw',
        'balance',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'affiliation_registrations';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function affiliationHistories()
    {
        return $this->hasMany(AffiliationHistory::class);
    }

    public function affiliationInsertHistories()
    {
        return $this->hasMany(AffiliationHistory::class)->where('affiliate_type', 'insert');
    }

    public function affiliationWithdrawHistories()
    {
        return $this->hasMany(AffiliationHistory::class)->where('affiliate_type', 'withdraw');
    }
}
