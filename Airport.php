<?php

class Airport
{
    private array $planes;
    private string $name;
    private static $airports = array();

    public function __construct($name, $planes = [])
    {
        Airport::$airports[] = $this;
        $this->name = $name;
        if(!empty($planes)) {
            foreach ($planes as $plane) {
                $this->takePlane($plane);
            }
        }else{
            $this->planes = [];
        }

    }

    public function takePlane($plane)
    {
        $this->planes[$plane->getName()] = $plane;
        $plane->planeLanded($this);
    }

    public function flyAway($plane)
    {
        $plane->planeLeft();
        unset($this->planes[$plane->getName()]);
    }

    public function onParking($plane)
    {
        $plane->goToParking;
    }

    public function readyToFly($plane)
    {
        $plane->readyTofly;
    }

    public function  boardingPassangers($plane)
    {
        $plane->boardingPassangers();
    }

    public function refueling($plane)
    {
        $plane->refueling();
    }

    public function getPlanes(): array
    {
            return $this->planes;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public static function getAllAirports(){
        return self::$airports;
    }

}
