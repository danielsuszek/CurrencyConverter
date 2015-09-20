<?php
namespace CurrencyConverter\CurrencyBundle\Entity;

class Currency
{
    // currency code to convert - see currency codes : http://en.wikipedia.org/wiki/ISO_4217
    // default: Russian ruble RUB to Polish zloty PLN
    protected $currencyFrom = 'RUB';
       
    protected $currencyTo = 'PLN';
    
    // value from user form
    protected $currencyInput;
    
    public function getCurrencyFrom()
    {
        return $this->currencyFrom;
    }
    
    public function setCurrencyFrom($currencyFrom)
    {
        $this->currencyFrom = $currencyFrom;
    }
    
    public function getCurrencyTo()
    {
        return $this->currencyTo;
    }
    
    public function setCurrencyTo($currencyTo)
    {
        $this->currencyTo = $currencyTo;
    }
    
    public function getCurrencyInput()
    {
        return $this->currencyInput;
    }
    
    public function setCurrencyInput($currencyInput)
    {
        $this->currencyInput = $currencyInput;
    }
    
    
}