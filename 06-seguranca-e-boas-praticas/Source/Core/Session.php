<?php


namespace Source\Core;

/**
 * Class Session
 * @package Source\Core
 */
class Session
{
    /**
     * Session constructor.
     */
    public function __construct()
    {
        if (!session_id()) {
            session_save_path(CONF_SES_PATH);
            session_start();
        }
    }

    /**
     * @param $name
     * @return mixed|null
     */
    public function __get($name)
    {
        if (!empty($_SESSION[$name])) {
            return $_SESSION[$name];
        }
        return null;
    }

    /**
     * @param $name
     */
    public function __isset($name)
    {
        return $this->has($name);
    }

    /**
     * @return object
     */
    public function all()
    {
        return (object)$_SESSION;
    }

    /**
     * @param string $key
     * @param $value
     * @return $this
     */
    public function set(string $key, $value)
    {
        $_SESSION[$key] = (is_array($value) ? (object)$value : $value);
        return $this;
    }

    /**
     * @param string $key
     * @return $this
     */
    public function unset(string $key)
    {
        unset($_SESSION[$key]);
        return $this;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function has(string $key)
    {
        return isset($_SESSION[$key]);
    }

    /**
     * @return $this
     */
    public function regenerate()
    {
        session_regenerate_id(true);
        return $this;
    }

    /**
     * @return $this
     */
    public function destroy()
    {
        session_destroy();
        return $this;
    }

    /**
     * @return null|Message
     */
    public function flash()
    {
        if ($this->has("flash")) {
            $flash = $this->flash();
            $this->unset("flash");
            return $flash;
        }
        return null;
    }

    /**
     * CSRF TOKEN
     */
    public function csrf()
    {
        $_SESSION['csrf_token'] = base64_encode(random_bytes(20));
    }
}