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
    /**
     * @var Twig_Loader_Filesystem
     */
    private $loader;

    /**
     * @var Twig_Environment
     */
    private $twig;

    /**
     * Constructor.
     *
     * @param SessionContract $session
     * @param Twig_Loader_Filesystem $loader
     * @param Twig_Environment $twig
     */
    public function __construct(SessionContract $session,
                                Twig_Loader_Filesystem $loader,
                                Twig_Environment $twig)
    {
        parent::__construct($session);

        $this->loader = $loader;
        $this->twig = $twig;
    }

    /**
     * Renders a given view.
     *
     * @param null $view
     * @param array $params
     * @return $this
     */
    public function render($view = null, array $params = [])
    {
        if (is_null($view) && ! isset($this->defaultView)) {
            throw new \LogicException("Cannot resolve the view to be rendered.", 500);
        }

        if (isset($this->defaultView)) {
            $view = $this->defaultView;
        }

        $view = str_replace(container("twig_views_file_extension"), "", $view);
        $view = str_replace(".", DIRECTORY_SEPARATOR, $view) . container("twig_views_file_extension");

        $this->twig->display($view, $params);

        return $this;
    }

    // TODO: Extract in Response class
    /**
     * Attach a specific HTTP status code to the response.
     *
     * @param int $code
     * @return $this
     */
    public function withCode($code) 
    {
        http_response_code($code);

        return $this;
    }
}
