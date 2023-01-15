<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property $comment_id
 * @property $user_id
 * @property $post_id
 * @property $reply_comment_id
 * @property $comment
 * @property $status
 * @property $created_at
 * @property $updated_at
 */
class Comments extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $perPage = 20;

    /**Configurações personalizadas Dextak*/
    public $timestamps = true;
    public $incrementing = false;
    protected $table = 'comments';
    protected $primaryKey = ['comment_id'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['comment_id', 'user_id', 'post_id', 'reply_comment_id', 'comment', 'status'];


    public function getUser()
    {
        return User::find($this->user_id);
    }

    public function getPost()
    {
        return Posts::find($this->post_id);
    }
}
