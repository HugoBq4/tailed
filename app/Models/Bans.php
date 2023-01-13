<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property $user_id
 * @property $until
 * @property $created_at
 * @property $updated_at
 */
class Bans extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $perPage = 20;

    /**Configurações personalizadas Dextak*/
    public $timestamps = true;
    public $incrementing = false;
    protected $table = 'bans';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'until'];

    public function getUser()
    {
        return User::find($this->visitor_id);
    }

    public function getDaysRemaining(){
        $diff = strtotime($this->created_at) - strtotime($this->until);
        // 1 day = 24 hours
        // 24 * 60 * 60 = 86400 seconds
        return ceil(abs($diff / 86400));
    }

}
