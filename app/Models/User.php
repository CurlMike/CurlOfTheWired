<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'account_name',
        'bio',
        'email',
        'private',
        'password',
        'avatar',
        'banner'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'joined_at' => 'datetime',
        'password' => 'hashed'
    ];

    public function entries(): HasMany {
        return $this->hasMany(Entry::class, 'user_id', 'id');
    }

    public function follows(User $user): bool {
        return $this->hasMany(Follow::class, 'follower_id', 'id')
        ->where('following_id', $user->id)
        ->exists();
    }

    public function followers(): BelongsToMany {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'follower_id');
    }

    public function followings(): BelongsToMany {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'following_id');
    }

    public function liked(Entry $entry): bool {
        return $this->hasMany(Like::class, 'user_id', 'id')
        ->where('entry_id', $entry->id)->exists();
    }
}
