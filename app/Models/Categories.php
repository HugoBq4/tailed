<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property $category_id
 * @property $value
 * @property $status
 */
class Categories extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'value',
    ];

    function getLink(){
        return route('categoria',$this->category_id);
    }


    use HasFactory;
}
