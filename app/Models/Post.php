<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
	
	 /**
     * @var array
     */
    protected $fillable = ['title', 'slug','content', 'website_key', 'created_at', 'updated_at'];
	
	public function setSlugAttribute($value) {

		if (static::whereSlug($slug = Str::slug($value))->exists()) {

			$slug = $this->incrementSlug($slug);
		}

		$this->attributes['slug'] = $slug;
	}

	public function incrementSlug($slug) {

		$original = $slug;

		$count = 2;

		while (static::whereSlug($slug)->exists()) {

			$slug = "{$original}-" . $count++;
		}

		return $slug;

	}
}
