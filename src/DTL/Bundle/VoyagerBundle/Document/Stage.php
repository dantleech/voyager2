<?php

namespace DTL\Bundle\VoyagerBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use DTL\Bundle\VoyagerBundle\Model\TimedVoyage;
use Symfony\Cmf\Component\Routing\RouteAwareInterface;
use Symfony\Component\Routing\Route;
use Symfony\Cmf\Bundle\BlogBundle\Util\PostUtils;

/**
 * Stage
 *
 * @PHPCR\Document(
 *   referenceable=true,
 *   repositoryClass="DTL\Bundle\VoyagerBundle\Repository\StageRepository"
 * )
 */
class Stage extends TimedVoyage implements RouteAwareInterface
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
     * @PHPCR\ReferenceOne(targetDocument="DTL\Bundle\VoyagerBundle\Document\Tour")
     */
    protected $tour;

    /**
     * @PHPCR\Children()
     */
    protected $children;

    /**
     * @PHPCR\Date()
     */
    protected $startDate;

    /**
     * @PHPCR\Referrers(referringDocument="Symfony\Cmf\Bundle\RoutingExtraBundle\Document\Route", referencedBy="routeContent")
     */
    protected $routes;

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
    }
    
    public function getParent() 
    {
        return $this->parent;
    }

    public function setTour(Tour $tour)
    {
        $this->tour = $tour;
        $this->parent = $tour;
    }

    public function getTour()
    {
        return $this->tour;
    }

    public function getStartDate() 
    {
        return $this->startDate;
    }
    
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function getType()
    {
        return 'stage';
    }
}
