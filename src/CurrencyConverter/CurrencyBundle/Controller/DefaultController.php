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
            // perform some action, such as saving the task to the database
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
    
    public function testFormAction(Request $request)
    {
        $currency = new Currency();
        $form =  $this->createFormBuilder($currency)
                ->add('currencyInput', 'integer', array('label' => 'RUB'))
                ->add('save', 'submit', array('label' => 'Convert to PLN'))
                ->getForm();    
        
        $form->handleRequest($request);  
        
        if ($form->isValid()) {                    
            exit('Form is valid');
        }
        return $this->render('CurrencyConverterCurrencyBundle:Default:testForm.html.twig', array(
            'form' => $form->createView()
        ));
    }
    
}
