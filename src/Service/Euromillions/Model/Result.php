<?php

namespace App\Service\Euromillions\Model;

class Result {
    private \DateTime $date;
    private string $myMillionId;
    private array $numbers;

    public function setDate(string $date): self {
        $this->date = new \DateTime($date);
        return $this;
    }

    public function getDate(): \DateTime|null {
        return $this->date;
    }

    public function setMyMillionId(string $myMillionId): self {
        $this->myMillionId = $myMillionId;
        return $this;
    }

    public function getMyMillionId(): string|null {
        return $this->myMillionId;
    }

    public function addNumber(string $type, string $value): self {
        if(empty($this->numbers)){
            $this->numbers = [];
        }
        
        $number = new Number($type, $value);
        $this->numbers[] = $number;
        return $this;
    }

    public function getNumbers(): array|null {
        return $this->numbers;
    }
}
