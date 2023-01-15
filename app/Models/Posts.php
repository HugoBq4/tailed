<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property $post_id
 * @property $user_id
 * @property $language
 * @property $views
 * @property $file
 * @property $description
 * @property $author
 * @property $status
 * @property $created_at
 * @property $updated_at
 */
class Posts extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $perPage = 20;

    /**Configurações personalizadas Dextak*/
    public $timestamps = true;
    public $incrementing = true;
    protected $table = 'posts';
    protected $primaryKey = 'post_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['post_id', 'user_id', 'language', 'views', 'file', 'description', 'author', 'status'];


    public function getUser()
    {
        return User::find($this->user_id);
    }

    public function getColetivo()
    {
        return Posts::where('status', '=', '1')->get() ?? [];
    }

}
