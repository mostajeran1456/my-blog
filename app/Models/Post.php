<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;

    const USER_ID = "user_id",
        TITLE = "title",
        SLUG = "slug",
        CONTENT = "content",
        CATEGORY_ID = "category_id",
        IMAGE = "image";

    protected $fillable=[
        self::USER_ID,
        self::TITLE,
        self::SLUG,
        self::CONTENT,
        self::CATEGORY_ID,
        self::IMAGE,
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
