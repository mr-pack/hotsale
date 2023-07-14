<?php

class App
{
    private $logger;
    
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }
    
    public function Run()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->ValidateForm($_POST);
            $this->RegisterUser($_POST);
            return;
        }
        header("Location: /index.html");
    }

    private function ValidateForm($user)
    {
        $form = new RegistrationForm($user);
        if (!$form->Validate()) {
           $errors = $form->getErrors();
           Response::JsonErrors($errors);
        }
    }

    private function RegisterUser($user)
    {
        $userStorage = new UserStorage();
        if ($userStorage->Exists($user['email'])) {
            $error = "User with email '{$user['email']}' already exists";
            $this->logger->Log($error);
            Response::JsonErrors([$error]);
        }
        $userStorage->AddUser($user);
        $message = "User with email '{$user['email']}' registered successfully";
        $this->logger->Log($message);
        Response::JsonMessages([$message]);
    }
}

