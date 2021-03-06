<?php namespace Frostbite\Validators;

class PostValidator extends AbstractValidator {

    /**
     * @var array
     */
    protected $rules = [
        'id'           => 'integer',
        'title'        => 'required|string',
        'contents'     => 'required|string',
        'is_important' => 'required|boolean',
        'category_id'  => 'required|integer',
    ];
}
