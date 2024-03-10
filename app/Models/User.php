<?php

namespace App\Models;
use App\Models\User as UserModel;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Kursus;
use App\Models\UserKursus;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_USER = 'user';
    const ROLE_ADMIN = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'notelp',
        'jeniskelamin',
        'email',
        'password',
        'status'
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

    public function kursus()
    {
        // return $this->belongsToMany(Kursus::class, 'user_kursus', 'user_id', 'kursus_id')
        return $this->belongsToMany(Kursus::class, 'user_kursus')
                    ->using(UserKursus::class)
                    ->withTimestamps();


        // return $this->belongsToMany(Kursus::class)
        //             ->using(UserKursus::class)
        //             ->withPivot(['status']);

    }
}
