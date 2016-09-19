<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ContactController extends Controller
{
    /**
     * @Route("/contacts/")
     */
    public function listAction()
    {
        $managerContact = $this->get('app.manager.contact');

        return $this->render('AppBundle:Contact:list.html.twig', array(
            'contacts' => $managerContact->findAll()
        ));
    }

}
