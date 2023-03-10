<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property $visitor_id
 * @property $visited_id
 * @property $created_at
 * @property $updated_at
 */
class Visits extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $perPage = 20;

    /**Configurações personalizadas Dextak*/
    public $timestamps = true;
    public $incrementing = false;
    protected $table = 'visits';
    protected $primaryKey = ['visitor_id','visited_id'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['visitor_id', 'visited_id'];


    public function getVisitor()
    {
        return User::find($this->visitor_id);
    }

    public function getVisited()
    {
        return User::find($this->visitor_id);
    }

    public function getFirstVisit()
    {
        return $this->created_at;
    }

    public function getLastVisit()
    {
        return $this->updated_at;
    }

}
