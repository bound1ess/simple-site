<?php namespace Frostbite\Validators;

class UploadValidator extends AbstractValidator {

    /**
     * @var array
     */
    protected $rules = [
        'file' => 'mimes:jpeg',
    ];
}
