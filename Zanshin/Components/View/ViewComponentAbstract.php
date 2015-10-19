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
    /**
     * @var SessionContract
     */
    protected $session;

    /**
     * @var string The default view, extracted from the session.
     */
    protected $defaultView;

    /**
     * Constructor.
     *
     * @param SessionContract $session
     */
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
        if ($this->session->has(ViewConstants::DEFAULT_VIEW_FOLDER_AND_FILE)) {
            $this->defaultView = $this->session->get(ViewConstants::DEFAULT_VIEW_FOLDER_AND_FILE);
        }

        return $this;
    }
}
