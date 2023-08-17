<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "content", "article_id"];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class, "article_id");
    }
}
