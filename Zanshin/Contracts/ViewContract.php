<?php

namespace Zanshin\Contracts;

/**
 * Interface ViewContract
 *
 * @author brlsv
 * @package Zanshin\Contracts\ViewContract
 */
interface ViewContract
{
    /**
     * Render a view.
     *
     * @param string|null $view
     * @param array $parms
     * @return mixed
     */
    public function render($view = null, array $parms = []);

    /**
     * Attach a specific HTTP status code to the response.
     *
     * @param int $code
     * @return mixed
     */
    public function withCode($code);
}
