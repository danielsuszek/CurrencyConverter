<?php

namespace CurrencyConverter\CurrencyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CurrencyConverterCurrencyBundle:Default:index.html.twig');
    }
}
