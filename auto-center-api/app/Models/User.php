<?php

namespace App\Models;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Traits\HasPermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User  extends Model
{
    use HasFactory;
    use HasRoles, HasPermissions;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $guard_name = 'api';

    protected $fillable = [
        'username',
        'auth_key',
        'access_token',
        'password_hash',
        'oauth_client',
        'oauth_client_user_id',
        'email',
        'status',
        'created_at',
        'updated_at',
        'logged_at',
    ];

    protected $hidden = [
        'password_hash',
    ];
}
