<?php
namespace CurrencyConverter\CurrencyBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class CurrencyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('currencyInput', 'text', array('label' => 'RUB'))
            ->add('save', 'submit', array('label' => 'Convert to PLN'))
            ->getForm();     
        
        
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CurrencyConverter\CurrencyBundle\Entity\Currency'
        ));
    }

    
    public function getName()
    {
        return 'currency';
    }
}
