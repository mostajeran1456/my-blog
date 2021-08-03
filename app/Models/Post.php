<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    const USER_ID = "user_id",
        TITLE = "title",
        SLUG = "slug",
        CONTENT = "content",
        IMAGE = "image";

    protected $fillable=[
        self::USER_ID,
        self::TITLE,
        self::SLUG,
        self::CONTENT,
        self::IMAGE,
    ];
}
