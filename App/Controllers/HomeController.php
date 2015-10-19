<?php

namespace App\Controllers;

use Zanshin\Components\Controller\ControllerComponent as Controller;
use Zanshin\Contracts\InputContract;
use Zanshin\Contracts\SessionContract;
use Zanshin\Contracts\ViewContract;

/**
 * Class HomeController
 *
 * @author brslv
 * @package App\Controllers
 */
class HomeController
{

    /**
     * @var ViewContract
     */
    protected $view;

    /**
     * Constructor.
     *
     * This controller (HomeController) has been registered as a service.
     * You can find the actual registration in the app-providers file.
     *
     * This is where the dependency injector mechanism injects
     * the dependencies of the controller.
     *
     * @param ViewContract $view
     */
    public function __construct(ViewContract $view)
    {
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

    public function about()
    {
        $this->view->render();
    }

}
