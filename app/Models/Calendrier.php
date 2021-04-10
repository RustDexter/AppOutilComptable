<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendrier extends Model
{
    use HasFactory;
    protected $fillable = [
		'title','user_id', 'start', 'end'
	];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
