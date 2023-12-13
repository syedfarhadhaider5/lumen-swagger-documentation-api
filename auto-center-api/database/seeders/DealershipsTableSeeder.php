<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Dealership;
use App\Models\User;

class DealershipsTableSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        for ($i = 1; $i <= 10; $i++) {
            Dealership::create([
                'business_name' => "Business Name $i",
                'dba' => "DBA $i",
                'business_phone' => "555-1234-$i",
                'business_fax' => "555-5678-$i",
                'business_address' => "Address $i",
                'business_open_since' => Carbon::now(),
                'nature_of_business' => "Nature of Business $i",
                'business_site' => "http://business$i.com",
                'mailing_business_address' => "Mailing Address $i",
                'dealer_type' => null, // You need to replace this with actual data
                'entity_type' => "Entity Type $i",
                'hear_about_us' => "Hear About Us $i",
                'referral_code' => "Referral Code $i",
                'representative' => "Representative $i",
                'owner_full_name' => "Owner Full Name $i",
                'owner_title' => "Owner Title $i",
                'owner_phone' => "555-8765-$i",
                'owner_email' => "owner$i@example.com",
                'opening_hours' => "Opening Hours $i",
                'location' => "Location $i",
                'primary_contact_name' => "Primary Contact Name $i",
                'primary_contact_title' => "Primary Contact Title $i",
                'primary_contact_phone' => "555-4321-$i",
                'primary_email' => "primary$i@example.com",
                'is_master_dealer_agreement_signed' => true,
                'current_package' => "Current Package $i",
                'license_expiry_date' => Carbon::now()->addYears(1),
                'reviews' => "Reviews $i",
                'rating' => "4.$i",
                'created_by' => $users->random()->id,
                'is_enabled' => true,
            ]);
        }
    }
}
