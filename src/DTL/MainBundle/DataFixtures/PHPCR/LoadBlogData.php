<?php

namespace DTL\MainBundle\DataFixtures\PHPCR;

use Doctrine\Common\Persistence\ObjectManager;


use Symfony\Cmf\Bundle\MenuBundle\Document\MultilangMenuNode;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Cmf\Bundle\BlogBundle\Document\Blog;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use PHPCR\Util\NodeHelper;
use Symfony\Cmf\Bundle\BlogBundle\Document\Post;

class LoadBlogData extends ContainerAware implements FixtureInterface, OrderedFixtureInterface
{
    public function getOrder()
    {
        return 10;
    }

    public function load(ObjectManager $dm)
    {
        $session = $dm->getPhpcrSession();

        $basepath = $this->container->getParameter('symfony_cmf_blog.blog_basepath');
        NodeHelper::createPath($session, $basepath);

        $routepath = $this->container->getParameter('symfony_cmf_blog.routing_basepath');
        NodeHelper::createPath($session, $routepath);

        $root = $dm->find(null, $basepath);

        $this->faker = \Faker\Factory::create();

        $blog = new Blog;
        $blog->setName('Travel');
        $blog->setParent($root);
        $dm->persist($blog);

        for ($i = 1; $i <= 20; $i++) {
            $p = new Post;
            $p->setTitle($this->faker->text(30));
            $p->setDate($this->faker->date);
            $p->setBody($this->faker->text(500));
            $p->setBlog($blog);
            $p->setTags(explode(" ", $this->faker->text(20)));
            $dm->persist($p);
        }

        $dm->flush();

        $blogRouteManager = $this->container->get('symfony_cmf_blog.blog_route_manager');
        $blogRouteManager->syncRoutes($blog);
        $dm->flush();
    }
}
