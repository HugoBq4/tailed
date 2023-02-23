<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property $id
 * @property $name
 * @property $nick
 * @property $cellphone
 * @property $picture
 * @property $background
 * @property $description
 * @property $email
 * @property $password
 * @property $sequence
 * @property $birthday
 * @property $language
 * @property $type_user
 * @property $status
 *
 * @mixin Builder
 * @mixin Model
 */
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
    ];

    /**
     * @return string
     */
    public function getPicture(): string
    {
        return $this->picture;
    }

    public function isBanned()
    {
        return Bans::where('id', '=', $this->id)->where('until', '>', date('Y-m-d H:i:s'))->get()->first();
    }

    public function timesBanned(): int
    {
        return count(Bans::where('id', '=', $this->id)->get());
    }


    public function getLastViews()
    {
        return Tails::where('user_id', '=', '1')
                ->join('posts', 'posts.post_id', '=', 'tails.post_id')
                ->orderBy('updated_at', 'desc')
                ->paginate() ?? [];
    }

    public function getLastHappyTails()
    {
        return Tails::where('user_id', '=', '1')
                ->join('posts', 'posts.post_id', '=', 'tails.post_id')
                ->orderBy('updated_at', 'desc')
                ->paginate() ?? [];
    }

}
