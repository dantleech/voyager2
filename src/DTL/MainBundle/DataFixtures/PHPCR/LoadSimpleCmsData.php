<?php

namespace DTL\MainBundle\DataFixtures\PHPCR;

use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\Yaml\Parser;

use Symfony\Cmf\Bundle\SimpleCmsBundle\DataFixtures\LoadCmsData;
use Symfony\Cmf\Bundle\SimpleCmsBundle\Document\MultilangRedirectRoute;
use Symfony\Cmf\Bundle\SimpleCmsBundle\Document\MultilangRoute;

use Symfony\Cmf\Bundle\MenuBundle\Document\MultilangMenuNode;

class LoadSimpleCmsData extends LoadCmsData
{
    private $yaml;

    public function getOrder()
    {
        return 5;
    }

    protected function getData()
    {
        return $this->yaml->parse(file_get_contents(__DIR__.'/../../Resources/data/page.yml'));
    }

    public function load(ObjectManager $dm)
    {
        $this->yaml = new Parser();

        parent::load($dm);
    }
}
