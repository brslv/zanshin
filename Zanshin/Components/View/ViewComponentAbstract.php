<?php

namespace Zanshin\Components\View;

use Zanshin\Contracts\ViewContract;
use Zanshin\Contracts\SessionContract;

/**
 * Class ViewComponentAbstract
 *
 * @author brlsv
 * @package Zanshin\Components\View
 */
abstract class ViewComponentAbstract implements ViewContract
{
    protected $session;

    protected $defaultView;

    public function __construct(SessionContract $session)
    {
        $this->session = $session;
        $this->setDefaultView();
    }

    /**
     * Set a default view, if any.
     *
     * @return $this
     */
    private function setDefaultView()
    {
        if ($this->session->has("defaultView")) {
            $this->defaultView = $this->session->get("defaultView"); // TODO: extract defaultView string in constant
        }

        return $this;
    }
}
