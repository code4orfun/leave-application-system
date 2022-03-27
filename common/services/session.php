<?php

class Session
{
    /**
     * Start a session
     * @return string
     */
    public function start(): string
    {
        session_start();
        return $this->getSessionId();
    }

    /**
     * @param $key
     * @param string $value
     * @return $this
     * @throws Exception
     */

    public function set($key, string $value): self
    {
        if (!$this->getSessionId()) {
            throw new Exception("Session is not started");
        }
        $_SESSION[$key] = $value;
        return $this;

    }

    /**
     * @param string $key
     * @return false|mixed
     * @throws Exception
     */
    public function getData(string $key): ?string
    {
        if (!$this->getSessionId()) {
            throw new Exception("Session is not started");
        }
        return isset($_SESSION[$key]) ? $_SESSION[$key] : false;
    }

    /**
     * Get session id
     * @return string
     */
    public function getSessionId(): string
    {
        return session_id();
    }

    /**
     * Destry a session
     * @return bool
     * @throws Exception
     */
    public function destroy(): bool
    {
        if (!$this->getSessionId()) {
           $this->start();
        }
        session_destroy();
        return true;
    }
}