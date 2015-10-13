<?php

namespace App\Controllers;
use App\TestClass;
use Zanshin\Contracts\RouterContract;

/**
 * Class HomeController
 *
 * @author brslv
 * @package App\Controllers
 */
class HomeController
{

    public function index()
    {
        echo "<h1>This is Zanshin.</h1>";
    }

}