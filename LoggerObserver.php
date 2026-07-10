<?php

require_once './interfaces.php';

class LoggerObserver implements Observer
{
    public function update(Subject $subject): void
    {
        $time = date('Y-m-d H:i:s');
        echo "[LOG] [{$time}] Estado cambiado a: {$subject->getState()}" . PHP_EOL;
    }
}