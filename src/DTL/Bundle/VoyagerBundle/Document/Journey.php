<?php

namespace DTL\Bundle\VoyagerBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use DTL\Bundle\VoyagerBundle\Model\TimedVoyage;
use Symfony\Cmf\Bundle\BlogBundle\Util\PostUtils;

/**
 * Journey
 *
 * @PHPCR\Document(referenceable=true)
 */
class Journey extends TimedVoyage 
{
    /** 
     * @PHPCR\Id()
     */
    protected $id;

    /** 
     * @PHPCR\NodeName()
     */
    protected $name;

    /** 
     * @PHPCR\ParentDocument()
     */
    protected $parent;

    /**
     * @PHPCR\ReferenceOne(targetDocument="DTL\Bundle\VoyagerBundle\Document\Stage")
     */
    protected $stage;

    /**
     * @PHPCR\Children()
     */
    protected $children;

    /**
     * Disance in meters
     *
     * @PHPCR\Long()
     */
    protected $distance;

    /**
     * Duration in seconds
     *
     * @PHPCR\Long()
     */
    protected $duration;

    /**
     * @PHPCR\String()
     */
    protected $slug;

    /**
     * @PHPCR\Double()
     */
    protected $startLongitude;

    /**
     * @PHPCR\Double()
     */
    protected $startLatitude;

    /**
     * @PHPCR\Double()
     */
    protected $endLongitude;

    /**
     * @PHPCR\Double()
     */
    protected $endLatitude;

    /**
     * @PHPCR\String()
     */
    protected $startAddress;

    /**
     * @PHPCR\String()
     */
    protected $endAddress;

    /**
     * @PHPCR\Date()
     */
    protected $date;

    public function getId()
    {
        return $id;
    }

    public function getName() 
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
        $this->slug = PostUtils::slugify($name);
    }

    public function getSlug()
    {
        return $this->slug;
    }
    
    public function getParent() 
    {
        return $this->parent;
    }
    
    public function setStage($stage)
    {
        $this->parent = $stage;
        $this->stage = $stage;
    }

    public function getStage()
    {
        return $this->stage;
    }

    public function getStartLatitude() 
    {
        return $this->startLatitude;
    }
    
    public function setStartLatitude($startLatitude)
    {
        $this->startLatitude = $startLatitude;
    }

    public function getEndLatitude() 
    {
        return $this->endLatitude;
    }
    
    public function setEndLatitude($endLatitude)
    {
        $this->endLatitude = $endLatitude;
    }

    public function getStartLongitude() 
    {
        return $this->startLongitude;
    }
    
    public function setStartLongitude($startLongitude)
    {
        $this->startLongitude = $startLongitude;
    }

    public function getEndLongitude() 
    {
        return $this->endLongitude;
    }
    
    public function setEndLongitude($endLongitude)
    {
        $this->endLongitude = $endLongitude;
    }

    public function getStartAddress() 
    {
        return $this->startAddress;
    }
    
    public function setStartAddress($startAddress)
    {
        $this->startAddress = $startAddress;
    }

    public function getEndAddress() 
    {
        return $this->endAddress;
    }
    
    public function setEndAddress($endAddress)
    {
        $this->endAddress = $endAddress;
    }

    public function getDistance() 
    {
        return $this->distance;
    }
    
    public function setDistance($distance)
    {
        $this->distance = $distance;
    }

    public function getDuration() 
    {
        return $this->duration;
    }
    
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    public function getDate() 
    {
        return $this->date;
    }
    
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    public function getType()
    {
        return 'journey';
    }
}
