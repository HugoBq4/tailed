<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property $follower_id
 * @property $followed_id
 * @property $created_at
 * @property $updated_at
 */
class Follows extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $perPage = 20;

    /**Configurações personalizadas Dextak*/
    public $timestamps = true;
    public $incrementing = false;
    protected $table = 'follows';
    protected $primaryKey = ['follower_id', 'followed_id'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['follower_id', 'followed_id'];


    public function getFollower()
    {
        return User::find($this->follower_id);
    }

    public function getFollowed()
    {
        return User::find($this->followed_id);
    }
}
