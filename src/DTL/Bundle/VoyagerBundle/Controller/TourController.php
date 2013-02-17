<?php

namespace DTL\Bundle\VoyagerBundle\Controller;

use Symfony\Component\Templating\EngineInterface;
use Doctrine\ODM\PHPCR\DocumentManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TourController
{
    protected $templating;
    protected $dm;

    public function __construct(
        EngineInterface $templating, 
        DocumentManager $dm
    ) {
        $this->templating = $templating;
        $this->dm = $dm;
    }

    protected function render($template, $params = array())
    {
        return new Response($this->templating->render($template, $params));
    }

    protected function getStageRepo()
    {
        return $this->dm->getRepository('DTL\Bundle\VoyagerBundle\Document\Stage');
    }

    public function tourAction(Request $request, $contentDocument)
    {
        $tour = $contentDocument;

        return $this->render(
            'DTLVoyagerBundle:Tour:tour_index.html.twig', array(
                'tour' => $tour,
            )
        );
    }

    public function stageAction(Request $request)
    {
        $slug = $request->get('stage_slug');
        $stage = $this->getStageRepo()->findBySlug($slug);

        return $this->render(
            'DTLVoyagerBundle:Tour:stage_index.html.twig', array(
                'stage' => $stage,
            )
        );
    }
}
