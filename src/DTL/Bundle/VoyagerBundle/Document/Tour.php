<?php

namespace DTL\Bundle\VoyagerBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use DTL\Bundle\VoyagerBundle\Model\TimedVoyage;
use Symfony\Cmf\Component\Routing\RouteAwareInterface;

/**
 * Tour
 *
 * @PHPCR\Document(referenceable=true)
 */
class Tour extends TimedVoyage implements RouteAwareInterface
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
     * @PHPCR\Children()
     */
    protected $children;

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
    
    public function addStage($stage)
    {
        $this->children[] = $stage;
    }

    public function getParent() 
    {
        return $this->parent;
    }
    
    public function setParent($parent)
    {
        $this->parent = $parent;
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
        return 'tour';
    }
}
