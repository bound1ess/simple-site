<?php namespace Frostbite\Validators;

class CategoryValidator extends AbstractValidator {

    /**
     * {@inheritdoc}
     */
    protected $rules = [
        'name'      => 'required|string',
        'parent_id' => 'required|integer',
    ];
}
