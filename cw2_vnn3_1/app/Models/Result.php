<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'questions_id',
        'chosen_option_id'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public function option()
    {
        return $this->belongsTo(Option::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }





}
