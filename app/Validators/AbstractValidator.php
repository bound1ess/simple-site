<?php namespace Frostbite\Validators;

abstract class AbstractValidator {

    /**
     * @var array
     */
    protected $rules = [];

    /**
     * @param array $data
     * @return boolean
     */
    public function validate(array $data)
    {
        return \Validator::make($data, $this->rules)->passes();
    }
}
