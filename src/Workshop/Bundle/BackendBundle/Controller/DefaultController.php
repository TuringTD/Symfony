<?php

namespace Workshop\Bundle\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="Home")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/login", name="Login")
     * @Template()
     */
    public function loginAction(Request $request)
    {
//        $request = $this->getRequest();
        $session = $request->getSession();
        $csrfToken = $this->get('form.csrf_provider')->generateCsrfToken('authenticate');
        $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
        return array(
            'csrfToken' => $csrfToken,
            'lastUsername' => $session->get(SecurityContext::LAST_USERNAME),
            'error' => ($error?$error->getMessage():null),
        );
    }

}
