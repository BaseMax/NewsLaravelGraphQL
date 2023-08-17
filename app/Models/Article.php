<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, "author_id");
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, "category_id");
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, "article_id");
    }

    public function rates(): HasMany
    {
        return $this->hasMany(Rating::class, "article_id");
    }

    public function bookmarks(): HasMany
    {
        return $this->hasMany(Bookmark::class, "article_id");
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, "article_id");
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
