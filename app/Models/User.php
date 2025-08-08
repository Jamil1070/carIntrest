<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'username',
        'birthday',
        'profile_photo',
        'about_me',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
            'birthday' => 'date',
        ];
    }

    /**
     * Check if user is admin
     */
    public function isAdmin(): bool
    {
        return $this->is_admin;
    }

    /**
     * Get display name (username or name)
     */
    public function getDisplayName(): string
    {
        return $this->username ?: $this->name;
    }

    /**
     * Get profile photo URL
     */
    public function getProfilePhotoUrl(): string
    {
        if ($this->profile_photo) {
            // Extract filename from path
            $filename = basename($this->profile_photo);
            return route('profile.photo', ['filename' => $filename]);
        }
        
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->getDisplayName()) . '&color=7F9CF5&background=EBF4FF';
    }

    /**
     * Relatie: een gebruiker heeft veel nieuwtjes
     */
    public function news()
    {
        return $this->hasMany(News::class);
    }

    /**
     * Relatie: een gebruiker heeft veel comments
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
