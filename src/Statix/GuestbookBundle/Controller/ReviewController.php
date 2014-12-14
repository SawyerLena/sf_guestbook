<?php

namespace Statix\GuestbookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Statix\GuestbookBundle\Entity\Review;
use Symfony\Component\HttpFoundation\Request;


class ReviewController extends Controller
{

    public function newAction(Request $request)
    {
        $review = new Review();
        $form = $this->createFormBuilder($review)
            ->add('site', 'text')
            ->add('reviewMark', 'choice', array(
                'choices'   => array(
                    'very_low' => 1,
                    'low'      => 2,
                    'middle'   => 3,
                    'high'     => 4,
                    'very_high' => 5
                )
            ))
            ->add('review', 'textarea')
            ->add('email', 'email')
            ->add('save', 'submit', array('label' => 'Add Review'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            return $this->redirect($this->generateUrl('statix_guestbook_review-success'));
        }

        return $this->render('StatixGuestbookBundle:ReviewForm:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function successAction()
    {
        return $this->render('StatixGuestbookBundle:ReviewForm:success.html.twig');
    }
}
