<?php

abstract class Plane{
    private string $name;
    private float $maxSpeed;
    private int $statusCode = 1;
    private static $planes = array();

    const IN_AIR = 1;
    const ON_THE_GROUND = 2;
    const ON_PARKING = 3;
    const READY_TO_FLY = 4;
    const BOARDING_PASSENGERS = 5;
    const REFUELING = 6;

    private Airport $airport;

    public function __construct($name, $maxSpeed, Airport $airport = null)
    {
        Plane::$planes[] = $this;
        $this->name = $name;
        $this->maxSpeed = $maxSpeed;
        if($airport){
            $airport->takePlane($this);
            $this->planeLanded($airport);
        }
    }

    public function planeLanded(Airport $airport)
    {
        $this->setStatusCode(2);
        $this->airport = $airport;
    }

    public function planeLeft()
    {
        $this->setStatusCode(1);
        unset($this->airport);
    }

    public function goToParking()
    {
        $this->setStatusCode(3);
    }

    public function readyToFly()
    {
        $this->setStatusCode(4);
    }

    public function boardingPassangers()
    {
        $this->setStatusCode(5);
    }

    public function refueling()
    {
        $this->setStatusCode(6);
    }


    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setMaxSpeed(float $maxSpeed): void
    {
        $this->maxSpeed = $maxSpeed;
    }

    public function setStatusCode(int $status): void
    {
        $this->statusCode = $status;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMaxSpeed(): float
    {
        return $this->maxSpeed;
    }

    public function getStatus(): string
    {
        $plane = new ReflectionClass("Plane");
        $consts = $plane->getConstants();
        $status_name = null;
        foreach ($consts as $name => $value) {
            if($value == $this->getStatusCode()){
                $status_name = $name;
                break;
            }
        }
        return $status_name;
    }

    private function getStatusCode()
    {
        return $this->statusCode;
    }

    public function getAirportName() :string
    {
        return $this->airport->getName();
    }

    public static function getAllPlanes(){
        return self::$planes;
    }

}
