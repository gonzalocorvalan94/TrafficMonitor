<?php 

require_once './interfaces.php';
require_once './TrafficMonitor.php';
require_once './EmailAlertObserver.php';
require_once './LiveDashboardObserver.php';
require_once './LoggerObserver.php';

$monitor = new TrafficMonitor();
$dashboard = new LiveDashboardObserver();
$emailAlert = new EmailAlertObserver();
$logger = new LoggerObserver();

$monitor->attach($dashboard);
$monitor->attach($emailAlert);
$monitor->attach($logger);

$monitor->setState("ALTO");
$monitor->setState("CRITICO");


/*

Ayuda da la IA: para hacer que funcione de forma continua, habria que quitar los set
e implementar el bucle.
El bucle lo que hace es elegir un estado aleatorio y setea ese estado. Esto hace que
el programa siga corriendo, la consola quede prendida y va mostrando los cambios de estado.

while (true) {
  $estadoAleatorio = ["NORMAL", "ALTO", "CRITICO"][array_rand(["NORMAL", "ALTO", "CRITICO"])];
  $monitor->setState($estadoAleatorio);
  sleep(3); // espera 3 segundos antes del próximo chequeo
}

*/
