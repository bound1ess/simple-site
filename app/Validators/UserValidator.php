<?php namespace Frostbite\Validators;

class UserValidator extends AbstractValidator {

    /**
     * {@inheritdoc}
     */
    protected $rules = [
        'email'        => 'required|email|unique:users',
        'new_password' => 'between:6,25',
    ];
}
