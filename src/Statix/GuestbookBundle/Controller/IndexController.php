<?php

namespace Statix\GuestbookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
	public function indexAction()
	{
		return $this->render('StatixGuestbookBundle:Default:homepage.html.twig');
	}
}