<?php

namespace DTL\Bundle\VoyagerBundle\Model;

use DTL\Bundle\VoyagerBundle\Model\TimedVoyageInterface;

class TimedVoyage implements TimedVoyageInterface
{
    public function getChildren()
    {
        return array();
    }

    public function getTimedVoyages()
    {
        $timedVoyages = array();
        $children = $this->getChildren();

        foreach ($children as $child) {
            if ($child instanceof TimedVoyageInterface) {
                $timedVoyages[] = $child;
            }
        }

        return $timedVoyages;
    }

    public function getDistance()
    {
        $distance = 0;
        foreach ($this->getTimedVoyages() as $voyage) {
            $distance += $voyage->getDistance();
        }
    }

    public function getDuration()
    {
        $distance = 0;
        foreach ($this->getTimedVoyages() as $voyage) {
            $distance += $voyage->getDuration();
        }
    }

    public function getTitle()
    {
        return $this->name;
    }
}
