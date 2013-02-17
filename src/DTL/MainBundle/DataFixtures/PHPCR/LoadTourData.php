<?php

namespace DTL\MainBundle\DataFixtures\PHPCR;

use DTL\Bundle\VoyagerBundle\Document\Journey;
use DTL\Bundle\VoyagerBundle\Document\Stage;
use DTL\Bundle\VoyagerBundle\Document\Tour;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PHPCR\Util\NodeHelper;
use Symfony\Cmf\Bundle\MenuBundle\Document\MultilangMenuNode;
use Symfony\Component\DependencyInjection\ContainerAware;

class LoadTourData extends ContainerAware implements FixtureInterface, OrderedFixtureInterface
{
    public function getOrder()
    {
        return 20;
    }

    public function load(ObjectManager $dm)
    {
        $session = $dm->getPhpcrSession();

        NodeHelper::createPath($session, '/cms/tours');

        $root = $dm->find(null, 'cms/tours');

        $this->faker = \Faker\Factory::create('fr_FR');

        $tour = new Tour;
        $tour->setName('Paris to Morocco');
        $tour->setParent($root);
        $dm->persist($tour);

        $stages = array(
            'Paris to l\'Escala',
            'l\'Escalar to Gibraltar',
            'Morocco',
            'Madrid to England'
        );

        $date = new \DateTime('2011/08/17');

        foreach ($stages as $stage) {
            $p = new Stage;
            $p->setName($stage);
            $p->setStartDate(clone $date);
            $p->setTour($tour);
            $dm->persist($p);

            for ($ii = 1; $ii <= rand(5,20); $ii++) {
                $date->modify('+ 1 day');
                $j = new Journey;
                $j->setName($this->faker->city.' to '.$this->faker->city);
                $j->setDistance($meters = (rand(50, 120) * 1000));
                $j->setDuration($meters * 5);
                $j->setStartLongitude($this->faker->longitude);
                $j->setStartLatitude($this->faker->latitude);
                $j->setEndLongitude($this->faker->longitude);
                $j->setEndLatitude($this->faker->latitude);
                $j->setStartAddress($this->faker->address);
                $j->setEndAddress($this->faker->address);
                $j->setDate(clone $date);
                $j->setStage($p);
                $dm->persist($j);
            }

        }

        $dm->flush();
    }
}
