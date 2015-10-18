<?php

namespace Zanshin\Components\View;

use Twig_Loader_Filesystem;
use Twig_Environment;
use Zanshin\Contracts\SessionContract;

/**
 * Class TwigViewComponent
 *
 * @author brlsv
 * @package Zanshin\Components\View
 */
class TwigViewComponent extends ViewComponentAbstract
{
    private $loader;

    private $twig;

    public function __construct(SessionContract $session,
                                Twig_Loader_Filesystem $loader,
                                Twig_Environment $twig)
    {
        parent::__construct($session);

        $this->loader = $loader;
        $this->twig = $twig;
    }

    public function render($view = null, array $params = [])
    {
        if (is_null($view) && ! isset($this->defaultView)) {
            throw new \LogicException("No specified view to be rendered", 500);
        }

        if (isset($this->defaultView)) {
            $view = $this->defaultView;
        }

        $view = str_replace(container("twig_views_file_extension"), "", $view);
        $view = str_replace(".", DIRECTORY_SEPARATOR, $view) . container("twig_views_file_extension");

        $this->twig->display($view, $params);
    }

    public function withCode($code) 
    {

    }
}
