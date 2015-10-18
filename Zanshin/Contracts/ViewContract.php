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
     * Set view folder path.
     *
     * @param string $path
     * @return mixed 
     */
    public function setViewsFolderPath($path);

    /**
     * Render a view.
     *
     * @param string|null $view
     * @return mixed
     */
    public function render($view = null);

    /**
     * Attach a specific HTTP status code to the response.
     *
     * @param int $code
     * @return mixed
     */
    public function withCode($code);
}
