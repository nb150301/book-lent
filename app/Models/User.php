<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\BorrowingStatus;
use App\Http\Controllers\Admin\BorrowHistoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function borrows(): HasMany
    {
        return $this->hasMany(BorrowHistory::class);
    }

    public function borrowingBooksDidNotReturn(): HasMany
    {
        return $this->hasMany(BorrowHistory::class)
            ->where('status', '=', BorrowingStatus::APPROVED);
    }

    public function orderingBook(): HasMany
    {
        return $this->hasMany(BorrowHistory::class)
            ->where('status', '=', BorrowingStatus::PENDING);
    }

    public function borrowingHistories(): HasMany
    {
        return $this->hasMany(BorrowHistory::class);
    }
}
