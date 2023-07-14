<?php

class UserStorage
{
    private $users = [];
    
    public function __construct()
    {
        $this->SeedUsers();
    }

    private function SeedUsers()
    {
        $this->users = [
            [
                'id' => uniqid(),
                'name' => 'John',
                'email' => 'john@example.com',
                'password' => 'pass123'
            ],
            [
                'id' => uniqid(),
                'name' => 'Jane',
                'email' => 'jane@example.com',
                'password' => 'password456'
            ],
            [
                'id' => uniqid(),
                'name' => 'Alice',
                'email' => 'alice@example.com',
                'password' => 'secret789'
            ],
            [
                'id' => uniqid(),
                'name' => 'Bob',
                'email' => 'bob@example.com',
                'password' => 'testpass'
            ],
            [
                'id' => uniqid(),
                'name' => 'Eva',
                'email' => 'eva@example.com',
                'password' => 'mypassword'
            ]
        ];
    }    
    
    public function AddUser($user)
    {
        $user = [
            'id' => uniqid(),
            'name' => $user['name'],
            'surname' => $user['surname'],
            'email' => $user['email'],
            'password' => $user['password']
        ];

        $this->users[] = $user;
    }

    public function Exists($email)
    {
        foreach ($this->users as $user) {
            if ($user['email'] === $email) {             
                return true;
            }
        }
        return false;
    }
}