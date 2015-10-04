<?php
namespace CurrencyConverter\CurrencyBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Currency 
{
     // currency code to convert - see currency codes : http://en.wikipedia.org/wiki/ISO_4217
    // default: Russian ruble RUB to Polish zloty PLN
    protected $currencyFrom = 'RUB';
       
    protected $currencyTo = 'PLN';
    
    
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
    
    public function convertCurrencyAction($currency_from, $currency_to, $currency_input)
    {
        $yql_base_url = "http://query.yahooapis.com/v1/public/yql";
        $yql_query = 'select * from yahoo.finance.xchange where pair in ("'.$currency_from.$currency_to.'")';
        $yql_query_url = $yql_base_url . "?q=" . urlencode($yql_query);
        $yql_query_url .= "&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
        $yql_session = curl_init($yql_query_url);
        curl_setopt($yql_session, CURLOPT_RETURNTRANSFER,true);
        $yqlexec = curl_exec($yql_session);
        $yql_json =  json_decode($yqlexec,true);
	// var_dump($yql_json);
        $data = $yql_json['query'];
        $rate = $data['results']['rate']['Rate'];
        $convertedCurrency = $rate * $currency_input;
        
        return $convertedCurrency;
        
    }
    
    
}