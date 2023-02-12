<?php

namespace App\Http\Controllers\Padrao;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Util\Logo;
use Illuminate\Http\Request;

/**
 * @property $logo
 * @property $categories
 *
 */
class LayoutController extends Controller
{

    public function __construct()
    {
        $this->logo = Logo::getLogo();
        $this->categories = Categories::get();
    }

}
