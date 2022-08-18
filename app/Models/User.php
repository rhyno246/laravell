<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rolesInstance () {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id' , 'role_id');
    }

    public function checkPermissionAccess ($permission) {
        // lấy được tất cả các quyền của user đang login vào hệ thống
        // so sánh giá trị đưa vào của router hiện tại xem có tồn tại trong các permission mà mình lấy đc hay ko

        $role = auth()->user()->rolesInstance;
        foreach ($role as $item) {
           $permissions = $item->permissions;
           if($permissions->contains('key_code', $permission)){
                return true;
           }
        }
        return false;
    }
}
