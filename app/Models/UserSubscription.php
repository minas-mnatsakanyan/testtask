<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubscription extends Model
{
    use HasFactory;
	
	 /**
     * @var array
     */
    protected $fillable = ['user_id', 'website_key', 'created_at', 'updated_at'];
	

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
