<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property $post_id
 * @property $user_id
 * @property $happy_tail
 * @property $created_at
 * @property $updated_at
 */
class Tails extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $perPage = 20;

    /**Configurações personalizadas Dextak*/
    public $timestamps = true;
    public $incrementing = false;
    protected $table = 'tails';
    protected $primaryKey = ['post_id', 'users_id'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['post_id', 'user_id', 'happy_tail'];


    public function getUser()
    {
        return User::find($this->user_id);
    }

    public function getPost()
    {
        return Posts::find($this->post_id);
    }

}
