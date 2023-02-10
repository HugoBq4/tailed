<?php

namespace App\Http\Controllers\Padrao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @property $teste
 *
 *
 */
class LayoutController extends Controller
{

    public function __construct()
    {
        $this->teste = 'oi :D';
    }

}
