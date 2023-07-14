<?php

class RegistrationForm
{
    private $name;
    private $surname;
    private $email;
    private $password;
    private $confirmPassword;
    private $errors;

    public function __construct($user)
    {
        $this->name = $user['name'];
        $this->surname = $user['surname'];
        $this->email = $user['email'];
        $this->password = $user['password'];
        $this->confirmPassword = $user['password-confirm'];
        $this->errors = [];
    }

    private function ValidateName()
    {
        if (empty($this->name)) {
            $this->AddError('name', 'Name is required');
        }
    }

    private function ValidateSurname()
    {
        if (empty($this->surname)) {
            $this->AddError('surname', 'Surname is required');
        }
    }

    private function ValidateEmail()
    {
        if (empty($this->email)) {
            $this->AddError('email', 'Email is required');
        } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->AddError('email', 'Invalid email format');
        }
    }

    private function ValidatePassword()
    {
        if (empty($this->password)) {
            $this->AddError('password', 'Password is required');
        } elseif (strlen($this->password) < 6) {
            $this->AddError('password', 'Password must be at least 6 characters');
        }
    }

    private function ValidatePasswordEquals()
    {
        if ($this->password !== $this->confirmPassword) {
            $this->AddError('confirm-password', 'Passwords do not match');
        }
    }

    private function AddError($field, $message)
    {
        $this->errors[$field] = $message;
    }

    public function HasErrors()
    {
        return !empty($this->errors);
    }

    public function GetErrors()
    {
        return $this->errors;
    }

    public function Validate()
    {
        $this->ValidateName();
        $this->ValidateSurname();
        $this->ValidateEmail();
        $this->ValidatePassword();
        $this->ValidatePasswordEquals();
        return !$this->HasErrors();
    }
}