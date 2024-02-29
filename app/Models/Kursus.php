<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kursus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    // public function users(){
    //     return $this->belongsToMany(User::class);
    // }
    public function users()
    {
        // return $this->belongsToMany(User::class, 'user_kursus', 'kursus_id', 'user_id')
        return $this->belongsToMany(User::class, 'user_kursus')
                    ->using(UserKursus::class)
                    ->withTimestamps();
        
    }
    // public function users()
    // {
    //     return $this->belongsToMany(User::class, 'user_kursus', 'kursus_id', 'user_id');
    // }
}
 