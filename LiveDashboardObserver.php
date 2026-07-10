<?php

require_once './interfaces.php';

class LiveDashboardObserver implements Observer
{
    #[Override]
    public function update(Subject $subject): void
    {
        echo "[DASHBOARD] Tráfico actualizado a: {$subject->getState()}" . PHP_EOL;
    }
}
