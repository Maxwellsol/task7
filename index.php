<?php
require_once 'Plane.php';
require_once 'Airport.php';
require_once 'Mig.php';
require_once 'Tu154.php';

//создаём миг
$mig1 = new Mig('Миг-1', 1500);

//cоздаём ТУ

$tu1 = new Tu154('ТУ-1', 500);

//создаем Аэропорт

$airp = new Airport('Аэропорт1');

echo '<h1> МИГ </h1><br/>';
//аэропорт принимает миг

$airp->takePlane($mig1);

//проверяем статус самолета

echo $mig1->getStatus().'<br/>';

//миг на парковку

$airp->onParking($mig1);

echo $mig1->getStatus().'<br/>';

//миг на заправку

$airp->refueling($mig1);
echo $mig1->getStatus().'<br/>';


//миг готов к взлету

$airp->readyToFly($mig1);
echo $mig1->getStatus().'<br/>';

//миг улетает

$airp->flyAway($mig1);
echo $mig1->getStatus().'<br/>';

//атака
$mig1->attack();
echo '<br/>';

echo '<h1> ТУ 154 </h1><br/>';
//принимаем ту

$airp->takePlane($tu1);

//статус ту

echo $tu1->getStatus().'<br/>';

$airp->onParking($mig1);

echo $tu1->getStatus().'<br/>';

// ту на заправку

$airp->refueling($tu1);
echo $tu1->getStatus().'<br/>';

//посадка пассажиров
$airp->boardingPassangers($tu1);

echo $tu1->getStatus().'<br/>';

//ту готов к взлету

$airp->readyToFly($tu1);
echo $tu1->getStatus().'<br/>';

//ту улетает

$airp->flyAway($tu1);
echo $tu1->getStatus().'<br/>';

