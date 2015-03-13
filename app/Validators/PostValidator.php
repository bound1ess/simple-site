<?php namespace Frostbite\Validators;

class PostValidator extends AbstractValidator {

    /**
     * @var array
     */
    protected $rules = [
        'id'           => 'required|integer',
        'title'        => 'required|string',
        'contents'     => 'required|string',
        'is_important' => 'required|boolean',
    ];
}
