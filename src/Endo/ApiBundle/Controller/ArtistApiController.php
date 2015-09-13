<?php

namespace Endo\ApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations\RouteResource;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ArtistController
 * @package Endo\ApiBundle\Controller
 *
 * @RouteResource("Artist")
 */
class ArtistApiController extends AbstractApiController
{
    /**
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function cgetAction()
    {
        $em = $this->getManager();
        $artists = $em->getRepository('EndoDataBundle:Artist')
            ->findAll();

        $view = View::create(
            [
                'artists' => $artists,
            ],
            200
        );

        return $this->handleView($view);
    }

    public function postAction()
    {

    }

    /**
     * @param $slug
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getAction($slug)
    {
        $em = $this->getManager();
        $artist = $em
            ->getRepository('EndoDataBundle:Artist')
            ->findOneBy(['slug' => $slug]);

        if (!$artist) {
            throw $this->createNotFoundException();
        }

        $view = View::create(
            [
                'artist' => $artist,
            ],
            200
        );

        return $this->handleView($view);
    }
}
