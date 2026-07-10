<?php

require_once './interfaces.php';

class TrafficMonitor implements Subject
{
    private string $state;
    private array $observers;

    public function __construct(string $state = "NORMAL")
    {
        $this->state = $state;
        $this->observers = [];
    }

    public function setState(string $state): void
    {
        if ($state == $this->state) {
            return;
        }
        if ($this->stateValidator($state)) {
            $this->state = $state;
            $this->notify();
        } else {
            throw new InvalidArgumentException("El estado debe ser NORMAL, ALTO o CRITICO");
        }
    }
    private function stateValidator(string $state): bool
    {
        $validStates = ["NORMAL", "ALTO", "CRITICO"];

        foreach ($validStates as $states) {
            if ($states == $state) {
                return true;
            }
        }
        return false;
    }

    #[Override]
    public function getState(): string
    {
        return $this->state;
    }
    
    #[Override]
    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    #[Override]
    public function attach(Observer $observer): void
    {
        $this->observers[] = $observer;
    }

    #[Override]
    public function detach(Observer $observer): void
    {
        $this->observers = array_filter($this->observers, fn ($value) => $value !== $observer);
    }

}
