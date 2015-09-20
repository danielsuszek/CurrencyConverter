<?php
namespace CurrencyConverter\CurrencyBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CurrencyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('currencyInput', 'text', array('label' => 'RUB'));     
        
        
    }

       public function getName()
    {
        return 'currency';
    }
}
