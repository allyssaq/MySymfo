<?php

namespace Vibe\SampleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\RedirectResponse;


class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('VibeSampleBundle:Default:index.html.twig', array('name' => $name));
    }


    public function displayACtion()
    {
    	return new Response("Display text here!");
    }


    public function argumentsAction($name)
    {
    	return new Response('<html><body>Hello '.$name.'!</body></html>');
    }


    public function fullNameAction($lastname, $firstname)
    {
    	return new Response('FirstName:'.$firstname.' Lastname:'.$lastname.' ');
    }


    public function homeAction($name, $page)
    {
    	return new Response('page:'.$page.'name: '.$name.'');
    }


    public function searchACtion(Request $request)
    {
    	$name = $request->query->get('name');
    	return new Response('you searched '. $name);
    }


    public function redirectingAction()
    {
    	$name = 'ally';
    	return $this->redirect('arguments/'.$name); // with parameters -- /arguments/{name}
    	// return $this->redirectToRoute('display_text'); 
    	// return new RedirectResponse($this->generateUrl('display_text'));
    	// return $this->redirect($this->generateUrl('display_fullname',array('firstname' => 'ally', 'lastname' => 'quitay')));
    	// return $this->redirectToRoute('display_text', array(), 301);
    }

    public function renderingAction()
    {
    	$name = 'ally';
    	return $this->render('VibeSampleBundle:Default:index.html.twig', array('name' => $name));
    }


    public function sessionAction(Request $request)
    {
    	// $session = new Session();
    	$session = $request->getSession();

	    // store an attribute for reuse during a later user request
	    $session->set('foo', 'bar');

	    // get the attribute set by another controller in another request
	    $foobar = $session->get('foobar');

	    // use a default value if the attribute doesn't exist
	    $filters = $session->get('filters', array());

	    krumo($foobar);
	    exit();
    }


    public function welcomeAction()
    {	
    	/*
    	
    	$name = "ally";
    	$response = new Response('Hello '.$name, Response::HTTP_OK);

		// create a JSON-response with a 200 status code
		$response = new Response(json_encode(array('name' => $name)));
		$response->headers->set('Content-Type', 'application/json');
		krumo($response);
		exit();
    	 */
    	return $this->render('VibeSampleBundle:Default:home.html.twig');
    }


    public function errorsAction()
    {
    	$product = array();
	    if (!$product) {
	        throw $this->createNotFoundException('The product does not exist');
	    }

	    return $this->render('VibeSampleBundle:Default:home.html.twig');
	    
	}
}
