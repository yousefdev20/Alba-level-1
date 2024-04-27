<?php

class StoreServiceRequest extends \FormValidation
{
    public function rules(): array
    {
        return [
            'section' => [new \Required()],
            'title' => [new Required()],
            'description' => [new Required()],
            'image' => [new Required(), new Mime()],
        ];
    }
}