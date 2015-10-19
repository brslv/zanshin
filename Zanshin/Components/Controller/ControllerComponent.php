<?php

namespace Zanshin\Components\Controller;

/**
 * Class ControllerComponent
 *
 * @author brslv
 * @package Zanshin\Components\Controller
 */
class ControllerComponent
{
    protected $view;

    protected $input;

    protected $session;

    /**
     * Constructor.
     *
     * This class can be extended by controllers,
     * if they are not registered as services.
     */
    public function __construct()
    {
        $this->view = container("ViewContract");
        $this->input = container("InputContract");
        $this->session = container("SessionContract");
    }
}