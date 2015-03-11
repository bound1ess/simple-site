<?php namespace Frostbite\Validators;

class UserValidator extends AbstractValidator {

    /**
     * {@inheritdoc}
     */
    protected $rules = [
        'email'        => 'required|email',
        'old_password' => 'required|between:6,25',
        'new_password' => 'between:6,25',
    ];
}
