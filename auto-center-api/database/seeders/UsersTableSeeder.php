<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'AC_ADMIN']);
        $users = [];

        for ($i = 1; $i < 3; $i++) {
            $user = [
                'username' => 'user' . $i,
                'auth_key' => Str::random(32),
                'access_token' => Str::random(40),
                'password_hash' => Hash::make('secret'),
                'oauth_client' => 'sample_oauth_client',
                'oauth_client_user_id' => 'sample_oauth_user_id',
                'email' => "user{$i}@example.com",
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'logged_at' => Carbon::now()->timestamp,
            ];

            $users[] = $user;
        }

        // Insert users into the database
        User::insert($users);

        // Assign roles to users
        foreach (User::all() as $user) {
            if ($user->id % 2 == 0) {
                $user->assignRole('AC_ADMIN');
            } else {
                $user->assignRole('DEALERSHIP_ADMIN');
            }
        }
    }
}
