<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '../db/models/user.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '../services/session.php';

class AuthService
{
    private Session $session;
    private User $user;

    public function __construct()
    {
        $this->session = new Session();
        $this->user = new User();
    }

    /**
     * Login a user
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function login(string $email, string $password): bool
    {
        try {
            $user = $this->user->findByColumnName('email', $email);
            if ($user['password'] === $password) {
                $this->session->start();
                $this->session->set('user_id', $user['id'])->set('is_admin', $user['is_admin']);
                return true;
            } else {
                return false;
            }
        } catch (Exception $exception) {
            return false;
        }
    }

    /**
     * Logout a user
     * @return bool
     */
    public function logout(): bool
    {
        try {
            $this->session->destroy();
            return true;
        } catch (Exception $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    /**
     * @return false|mixed|string|null
     */
    public function getCurrentUserId()
    {
        if (!$this->session->getSessionId()) {
            $this->session->start();
        }
        try {
            return $this->session->getData('user_id');
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @return false|mixed|string|null
     */
    public function isAdmin()
    {
//        $this->session->start();
        try {
            return $this->session->getData('is_admin');
        } catch (Exception $e) {
            return false;
        }
    }

    public function isUserLoggedIn()
    {
        return $this->getCurrentUserId();
    }

    public function redirectUser()
    {
        if ($this->isAdmin()) {
            header('location: /admin');
        } else {
            header('location: /employee');

        }
    }


}