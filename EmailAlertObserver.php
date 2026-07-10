<?php

require_once './interfaces.php';

class EmailAlertObserver implements Observer
{
    #[Override]
    public function update(Subject $subject): void
    {
        if ($subject->getState() === "CRITICO") {
            echo "[EMAIL] ¡ALERTA! El tráfico de red es CRITICO. Notificando al Administrador" . PHP_EOL;
        }
    }
}