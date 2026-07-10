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

