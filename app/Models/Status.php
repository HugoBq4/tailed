<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property $language_id
 * @property $value
 */
class Status extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $perPage = 20;

    /**Configurações personalizadas Dextak*/
    public $timestamps = false;
    public $incrementing = true;
    protected $table = 'status';
    protected $primaryKey = 'status_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['status_id', 'value'];

}
