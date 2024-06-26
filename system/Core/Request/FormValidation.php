<?php

abstract class FormValidation extends Request
{
    public function __construct()
    {
        parent::__construct();

        $this->handel();
    }

    public function rules(): array
    {
        return [];
    }

    public function validated(): array
    {
        foreach ($this->rules() as $rule)
        {

        }

        return [];
    }

    public function messages(): array
    {
        return [];
    }

    private function handel(): array
    {
        foreach ($this->rules() as $key => $value)
        {
            foreach ($value as $rule)
            {
                $instance = new $rule;
                $instance($this->only([$key]));
            }
        }

        return [];
    }
}