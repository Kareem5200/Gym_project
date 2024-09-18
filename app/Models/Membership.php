<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'user_id',
        'trainer_id',
        'category_id',
        'department_id',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return  $this->belongsTo(User::class,'user_id');
    }
    public function trainer(){
        return  $this->belongsTo(User::class,'trainer_id');
    }
    public function department(){
        return  $this->belongsTo(Department::class,'department_id');
    }
    public function category(){
        return  $this->belongsTo(Category::class,'category_id');
    }

    public function scopeActiveMembership($query){
        return $query->where('end_date','>=',now());
    }
}
