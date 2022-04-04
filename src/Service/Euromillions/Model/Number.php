<?php

namespace App\Service\Euromillions\Model;

class Number {
    private string $type;
    private string $value;

    public function __construct(string $type, string $value)
    {
        $this->type = $type;
        $this->value = $value;
    }

    public function getType(): string|null {
        return $this->type;
    }
    
    public function getValue(): string|null {
        return $this->value;
    }
}
