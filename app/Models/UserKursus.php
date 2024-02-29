<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// class UserKursus extends Model
// {
//     use HasFactory;
// }
class UserKursus extends Pivot
{
    protected $table = 'user_kursus';

    // Jika Anda memiliki kolom tambahan di tabel pivot, Anda bisa mendefinisikannya di sini
    // protected $fillable = ['status'];
}
