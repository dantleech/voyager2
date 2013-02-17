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
 * @PHPCR\Document(referenceable=true)
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
     * @PHPCR\String()
     */
    protected $slug;

    /** 
     * @PHPCR\ParentDocument()
     */
    protected $parent;

    /**
     * @PHPCR\Children()
     */
    protected $children;

    /**
     * @PHPCR\Date()
     */
    protected $startDate;

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
    
    public function getParent() 
    {
        return $this->parent;
    }
    
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    public function getStartDate() 
    {
        return $this->startDate;
    }
    
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    public function getRoutes()
    {
        return array(new Route('/stage', array(
            '_controller' => 'DTLVoyagerBundle:Tour:stage',
        )));
    }
}
