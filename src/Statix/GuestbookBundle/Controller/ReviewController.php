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
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5
                )
            ))
            ->add('review', 'textarea')
            ->add('email', 'email')
            ->add('save', 'submit', array('label' => 'Add Review'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($review);
            $em->flush();

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

    public function viewAction()
    {
        $repository = $this->getDoctrine()->getRepository('Statix\GuestbookBundle\Entity\Review');
        $reviews = $repository->findAll();
        return $this->render('StatixGuestbookBundle:ReviewForm:viewAll.html.twig', array(
            'reviews' => $reviews
        ));
    }
}
