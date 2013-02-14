<?php

namespace DTL\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DemoController extends Controller
{
    public function dynamicAction()
    {
        return $this->render('DTLMainBundle:Demo:dynamic.html.twig');
    }

    public function staticAction()
    {
        return $this->render('DTLMainBundle:Demo:static.html.twig');
    }
}