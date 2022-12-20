<?php

class Airport
{
    private array $planes;
    private string $name;

    public function __construct($name, $planes = [])
    {
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
        $plane->setStatus('on parking');
    }

    public function readyToFly($plane)
    {
        $plane->setStatus('ready to fly');
    }

    public function  boardingPassangers($plane)
    {
        $plane->setStatus('boarding passengers');
    }

    public function refueling($plane)
    {
        $plane->setStatus('refueling');
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

}