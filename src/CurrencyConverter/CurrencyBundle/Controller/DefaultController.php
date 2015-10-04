<?php

namespace CurrencyConverter\CurrencyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// import new namespaces
use CurrencyConverter\CurrencyBundle\Entity\Currency;
use CurrencyConverter\CurrencyBundle\Form\CurrencyType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {       
        // create empty model for Currency
        $currency = new Currency();
        // create form
        $form = $this->createForm(new CurrencyType, $currency);
        
        // render view with form
        $form->handleRequest($request);  
        
        if ($form->isValid()) {
            
            $currencyInput = $form["currencyInput"]->getData();
            
            $convertedCurrency = $currency->convertCurrencyAction('RUB', 'PLN', $currencyInput);
            
            return $this->render('CurrencyConverterCurrencyBundle:Default:index.html.twig', array(
                'form' => $form->createView(), 'currencyInput' => $currencyInput, 'convertedCurrency' => $convertedCurrency
            ));
        }
        
        return $this->render('CurrencyConverterCurrencyBundle:Default:index.html.twig', array(
            'form' => $form->createView(), 'currencyInput' => '', 'convertedCurrency' => ''
        ));
    }
    
    
    
}
