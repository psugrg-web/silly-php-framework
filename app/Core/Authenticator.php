<?php

namespace Core;

class Authenticator
{
    protected $db;

    protected function user($email)
    {
        return $this->db->query('select * from users where email = :email', [
            'email' => $email
        ])->find();
    }

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function register($email, $password)
    {
        if ($this->user($email)) {
            return false;
        }

        // if no, save one to the database, and then log the user in and redirect
        $this->db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ]);

        return true;
    }

    public function attempt($email, $password)
    {
        if ($user = $this->user($email)) {
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'email' => $email,
                    'id' => $user['id']
                ]);

                return true;
            }
        }

        return false;
    }

    public function login($user)
    {
        Session::put('user', [
            'email' => $user['email'],
            'id' => $user['id']
        ]);

        session_regenerate_id(true);
    }

    public static function logout()
    {
        Session::destroy();
    }
}
