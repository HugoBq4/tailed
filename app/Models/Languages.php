<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property $language_id
 * @property $value
 */
class Languages extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $perPage = 20;

    /**Configurações personalizadas Dextak*/
    public $timestamps = false;
    public $incrementing = true;
    protected $table = 'languages';
    protected $primaryKey = 'language_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['language_id', 'value'];

}
