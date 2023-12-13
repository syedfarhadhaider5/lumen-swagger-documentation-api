<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username', 32)->nullable();
            $table->string('auth_key', 32)->nullable();
            $table->string('access_token', 40)->nullable();
            $table->string('password_hash');
            $table->string('oauth_client')->nullable();
            $table->string('oauth_client_user_id')->nullable();
            $table->string('email')->nullable();
            $table->smallInteger('status')->default(1);
            $table->timestamps();
            $table->integer('logged_at')->nullable();
        });
        \Spatie\Permission\Models\Role::create(['name' => 'AC_ADMIN']);
        \Spatie\Permission\Models\Role::create(['name' => 'DEALERSHIP_ADMIN']);
        \Spatie\Permission\Models\Role::create(['name' => 'AC_ACCOUNT_REP']);
        \Spatie\Permission\Models\Role::create(['name' => 'DEALERSHIP_MANAGER']);
        \Spatie\Permission\Models\Role::create(['name' => 'DEALERSHIP_SALE_REP']);
// permission
        \Spatie\Permission\Models\Permission::create(['name' => 'LOGIN_TO_BACKEND']);        $users = [];

        for ($i = 1; $i < 3; $i++) {
            $user = [
                'username' => 'user' . $i,
                'auth_key' => \Illuminate\Support\Str::random(32),
                'access_token' => \Illuminate\Support\Str::random(40),
                'password_hash' => \Illuminate\Support\Facades\Hash::make('secret'),
                'oauth_client' => 'sample_oauth_client',
                'oauth_client_user_id' => 'sample_oauth_user_id',
                'email' => "user{$i}@example.com",
                'status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'logged_at' => \Carbon\Carbon::now()->timestamp,
            ];

            $users[] = $user;
        }

        // Insert users into the database
        \App\Models\User::insert($users);
        $user1 = \App\Models\User::find(1);
        $user2 = \App\Models\User::find(2);

        $user1->assignRole('AC_ADMIN');
        $user2->assignRole('DEALERSHIP_ADMIN');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
