<?php

namespace DTL\MainBundle\DataFixtures\PHPCR;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Cmf\Bundle\RoutingExtraBundle\Document\Route;

class LoadRouteData extends ContainerAware implements FixtureInterface, OrderedFixtureInterface
{
    public function getOrder()
    {
        return 30;
    }

    public function load(ObjectManager $dm)
    {
        $root = $dm->find(null, '/cms/routes');
        $tour = $dm->find(null, '/cms/tours/Paris to Morocco');

        if (!$tour) {
            throw new \Exception('cannot find tour');
        }

        $route = new Route;
        $route->setName('tour');
        $route->setParent($root);
        $route->setRouteContent($tour);
        $dm->persist($route);

        $dm->flush();
    }
}


