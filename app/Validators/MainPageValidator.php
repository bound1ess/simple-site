<?php namespace Frostbite\Validators;

class MainPageValidator extends AbstractValidator {

    /**
     * {@inheritdoc}
     */
    protected $rules = [
        'name' => 'required',
        'desc' => 'required',
    ];
}
