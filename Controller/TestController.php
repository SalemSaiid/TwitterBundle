<?php

namespace SS\TwitterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TestController extends Controller
{
    /**
     * @Route("/twitter/get/user_timeline")
     */
    public function getTokenAction()
    {
        $twitter = $this->get('ss_twitter_api');
        $twitter_object = $twitter->getUserTimeLine('vcomfreedom',40);

        var_dump($twitter_object); die;
    }
}
