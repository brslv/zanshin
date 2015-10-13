<?php

namespace App\Core;

/**
 * Class Boot
 *
 * @author brslv
 * @package App\Core
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
         * @var $app \Zanshin\Core\Application
         */
        $app = container("Application");

        /**
         * Controllers namespace.
         *
         * The default controller namespace is \App\Controllers.
         * It corresponds to the App/Controllers folder.
         *
         * You can change the directory from the method bellow.
         */
        $app->setControllersNamespace("\\App\\Controllers");

        $app->run();
    }

}