<?php

abstract class Plane{
    private string $name;
    private float $maxSpeed;
    private string $status = 'in air';

    private Airport $airport;

    public function __construct($name, $maxSpeed, Airport $airport = null)
    {
        $this->name = $name;
        $this->maxSpeed = $maxSpeed;

        if($airport){
            $airport->takePlane($this);
            $this->planeLanded($airport);
        }
    }

    public function planeLanded(Airport $airport)
    {
        $this->status = 'on the ground';
        $this->airport = $airport;
    }

    public function planeLeft()
    {
        $this->status = 'in air';
        unset($this->airport);
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setMaxSpeed(float $maxSpeed): void
    {
        $this->maxSpeed = $maxSpeed;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
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
        return $this->status;
    }

    public function getAirportName() :string
    {
        return $this->airport->getName();
    }

}
