<?php

namespace App\Models;

use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['url','shortener'];

    public static function getUniqueShortUrl() {
		
		$shortener = Str::random(5);

		if(static::whereShortener($shortener)->count() > 0) {
			return static::getUniqueShortUrl();
		}
		else {
			return $shortener;
		}
		
	}
}
