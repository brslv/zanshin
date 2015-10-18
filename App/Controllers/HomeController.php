<?php

namespace App\Controllers;

use Zanshin\Contracts\InputContract;
use Zanshin\Components\Input\InputComponent;

/**
 * Class HomeController
 *
 * @author brslv
 * @package App\Controllers
 */
class HomeController
{
    private $input;

    /**
     * Constructor.
     *
     * This controller (HomeController) has been registered as a service.
     * You can find the actual registration in the app-providers file.
     *
     * This is where the dependency injector mechanism injects
     * the dependencies of the controller (InputContract).
     *
     * @param InputContract $input
     * @return void
     */
    public function __construct(InputContract $input) 
    {
        $this->input = $input;
    }

    /**
     * Index action.
     *
     * @return void
     */
    public function index()
    {
        echo "<h1>This is Zanshin.</h1>";

        if ($this->input->has("get", "name")) {
            echo sprintf("Aloha, %s", $this->input->get("name"));
        }
    }

}
