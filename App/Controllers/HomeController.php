<?php

namespace App\Controllers;

use Zanshin\Contracts\InputContract;
use Zanshin\Contracts\ViewContract;

/**
 * Class HomeController
 *
 * @author brslv
 * @package App\Controllers
 */
class HomeController
{
    private $input;

    private $view;

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
     * @param ViewContract $view
     */
    public function __construct(InputContract $input, ViewContract $view) 
    {
        // TODO: extract these in a base controller.
        $this->input = $input;
        $this->view = $view;
    }

    /**
     * Index action.
     *
     * @return void
     */
    public function index()
    {
        $this->view->render("home.index", ["name" => "Zanshin", "salute" => "guest"])->withCode(200);
    }

}
