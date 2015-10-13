<?php

namespace Zanshin\Core;

/**
 * Class Boot
 *
 * @author brslv
 * @package Zanshin\Core
 */
class Boot
{

    /**
     * Gets an application instance from the container
     * and calls it's run() method.
     *
     * @return void
     */
    public function application()
    {
        /**
         * @var $app Application
         */
        $app = container("Application");

        $app->run();
    }

}