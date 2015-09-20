<?php

namespace CurrencyConverter\CurrencyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// import new namespaces
use CurrencyConverter\CurrencyBundle\Entity\Currency;
use CurrencyConverter\CurrencyBundle\Form\CurrencyType;

class DefaultController extends Controller
{
    public function indexAction()
    {       
        // create empty model for Currency
        $currency = new Currency();
        // create form
        $form = $this->createForm(new CurrencyType, $currency);
        
        // render view with form
        return $this->render('CurrencyConverterCurrencyBundle:Default:index.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
