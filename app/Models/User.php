<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'picture',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function hasPicture(): bool
    {
        return $this->picture != null;
    }

    public function avatar(?int $size = 150): string
    {
        $hash = hash(algo: 'sha256', data: $this->email);

        return $this->hasPicture() ? Storage::url($this->picture) : "https://www.gravatar.com/avatar/{$hash}?s={$size}&d=mp";
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
