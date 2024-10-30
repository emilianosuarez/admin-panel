<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $fillable = [
        'article_id',
        'title',
        'content',
        'active',
        'article_created_at',
        'user_id',
    ];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
