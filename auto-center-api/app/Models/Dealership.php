<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dealership extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_name',
        'dba',
        'business_phone',
        'business_fax',
        'business_address',
        'business_open_since',
        'nature_of_business',
        'business_site',
        'mailing_business_address',
        'dealer_type',
        'entity_type',
        'hear_about_us',
        'referral_code',
        'representative',
        'owner_full_name',
        'owner_title',
        'owner_phone',
        'owner_email',
        'opening_hours',
        'location',
        'primary_contact_name',
        'primary_contact_title',
        'primary_contact_phone',
        'primary_email',
        'is_master_dealer_agreement_signed',
        'current_package',
        'license_expiry_date',
        'reviews',
        'rating',
        'created_by',
        'is_enabled',
    ];

    protected $casts = [
        'is_master_dealer_agreement_signed' => 'boolean',
        'license_expiry_date' => 'date',
        'is_enabled' => 'boolean',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'dealership_id');
    }
}
