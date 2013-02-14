<?php

namespace DTL\Bundle\VoyagerBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use DTL\Bundle\VoyagerBundle\Model\TimedVoyage;

/**
 * Stage
 *
 * @PHPCR\Document(referenceable=true)
 */
class Stage extends TimedVoyage
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
    
}
