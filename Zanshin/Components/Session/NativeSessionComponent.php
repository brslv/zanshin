<?php

namespace Zanshin\Components\Session;

use Zanshin\Contracts\SessionContract;

/**
 * Class NativeSession
 *
 * @author brslv
 * @package Zanshin\Components\Session
 */
class NativeSessionComponent implements SessionContract
{
    /**
     * The default lifetime of the session.
     */
    const DEFAULT_LIFETIME = 3600; // 60 minutes

    /**
     * The default secure of the session.
     */
    const DEFAULT_SECURE = false;

    /**
     * The default name of the session.
     */
    const DEFAULT_NAME = "___session";

    /**
     * @var string $name The name of the session.
     */
    protected $name;

    /**
     * @var string $lifeTime The lifetime of the session.
     */
    protected $lifeTime;

    /**
     * @var string $path The path of the session.
     */
    protected $path;

    /**
     * @var string $domain The domain of the session.
     */
    protected $domain;

    /**
     * @var bool $secure Is the session secure?
     */
    protected $secure;

    /**
     * @var bool $isStarted Is the session started?
     */
    protected $isStarted;

    /**
     * Constructor.
     *
     * @var string $name
     * @var string $lifeTime
     * @var string $path
     * @var string $domain
     * @var string $secure
     */
    public function __construct(
        $name = null, 
        $lifeTime = null, 
        $path = null, 
        $domain = null, 
        $secure = null
    ) {
        $this->setName($name);
        $this->setLifeTime($lifeTime);
        $this->setPath($path);
        $this->setDomain($domain);
        $this->setSecure($secure);
    }

    /**
     * Starts a new native session.
     * 
     * @return NativeSessionComponent
     */
    public function start()
    {
        if ($this->isStarted) {
            throw new \Exception("Session has already been started", 500);
        }
     
        $this->startNativePhpSession();

        $this->isStarted = true;

        return $this;
    }

    /**
     * Perform the actual start of the native php session.
     *
     * @return NativePhpSession
     */
    public function startNativePhpSession()
    {
        if ($this->getIsStarted()) {
            throw new \Exception("Session has already been started.", 500);
        }

        session_start();

        return $this;
    }

    /**
     * Destroys the current native session.
     *
     * @return NativeSessionComponent
     */
    public function destroy()
    {
        if ( ! $this->getIsStarted()) {
            throw new \Exception("No active session available.", 500);
        }

        session_unset();
        session_destroy();

        $this->isStarted = false;

        return $this;
    }

    /**
     * Get e specific value from the native session.
     *
     * @param string $key The key identifier of the session value.
     * @return mixed|null
     */
    public function get($key) 
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }

        return null;
    }

    /**
     * Set specific key-value pair to the native session.
     *
     * @return NativeSessionComponent
     */
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;

        return $this;
    }

    /**
     * Set name.
     *
     * @return string $name
     */
    public function setName($name)
    {
        if ( ! $name || strlen($name) < 3) {
            $this->name = self::DEFAULT_NAME;

            return $this->name;
        }

        return $this->name = $name;
    }

    /**
     * Get name.
     * 
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set lifeTime.
     *
     * @return string $lifeTime
     */
    public function setLifeTime($lifeTime)
    {
        if ($lifeTime < 0) {
            $this->lifeTime = self::DEFAULT_LIFETIME;

            return $this->lifeTime;
        }

        return $this->lifeTime = $lifeTime;
    }

    /**
     * Get lifeTime.
     *
     * @return string $lifeTime
     */
    public function getLifeTime()
    {
        return $this->lifeTime;
    }

    /**
     * Set path
     * 
     * @return string $path
     */
    public function setPath($path)
    {
        return $this->path = $path;
    }

    /**
     * Get path
     *
     * @return string $path
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set domain
     *
     * @return string $domain
     */
    public function setDomain($domain)
    {
        return $this->domain = $domain;
    }

    /**
     * Get domain.
     *
     * @return string $domain
     */
    public function getDomain($domain)
    {
        return $this->domain;
    }

    /**
     * Set secure.
     *
     * @return string $secure
     */
    public function setSecure($secure) 
    {
        if (is_null($secure)) {
            $this->secure = self::DEFAULT_SECURE;

            return $this->secure;
        }

        if ( ! is_boolean($secure)) {
            throw new \Exception("Session security must be a boolean value.", 500);
        }

        return $this->secure = $secure;
    }

    /**
     * Get secure.
     *
     * @return string $secure
     */
    public function getSecure()
    {
        return $this->secure;
    }

    /**
     * Get isStarted.
     *
     * @return string $isStarted
     */
    public function getIsStarted()
    {
        return $this->isStarted;
    }

}
