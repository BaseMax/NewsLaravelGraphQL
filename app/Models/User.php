<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, "user_id");
    }

    public function rates(): HasMany
    {
        return $this->hasMany(Rating::class, "user_id");
    }

    public function bookmarks(): HasMany
    {
        return $this->hasMany(Bookmark::class, "user_id");
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, "user_id");
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class, "user_id");
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class, "user_id");
    }
}
