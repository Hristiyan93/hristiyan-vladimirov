<?php
namespace Payment;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

use PayPal\Api\Amount;
use PayPal\Api\CreditCard;
use PayPal\Api\FundingInstrument;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\Transaction;

use PayPal\Api\Sale;
use PayPal\Api\Refund;

class Paypal implements PaymentInterface
{

    protected $amount;
    protected $card;
    
    private $clientId;
    private $secret;
    private $mode;
    
    function __construct($config){
        $this->clientId = $config->clientId;
        $this->secret = $config->secret;
        $this->mode = $config->mode;
    }
    
    protected function getApiContext()
    {
        $apiContext = new ApiContext( new OAuthTokenCredential($this->clientId, $this->secret));
        $apiContext->setConfig(
            array(
                'mode' => $this->mode,
                'http.CURLOPT_CONNECTTIMEOUT' => 10,
                'cache.FileName' => ROOT_PATH . '/etc/cache/auth.cache'
            )
            );
        return $apiContext;
    }
    
    public function setCreditCard($type, $number, $expireMonth, $expireYear, $ccv, $firstname, $lastname)
    {
        $this->card = new CreditCard();
        $this->card->setType($type)
            ->setNumber($number)
            ->setExpireMonth($expireMonth)
            ->setExpireYear($expireYear)
            ->setCvv2($ccv)
            ->setFirstName($firstname)
            ->setLastName($lastname);
        return $this;
    }

    public function setAmount($amount, $currency)
    {
        $this->amount = new Amount();
        $this->amount->setCurrency($currency)
        ->setTotal($amount);
        return $this;
    }

    public function doPayment()
    {
        $fi = new FundingInstrument();
        $fi->setCreditCard($this->card);
        
        $payer = new Payer();
        $payer->setPaymentMethod("credit_card")
            ->setFundingInstruments(array($fi));
        
        $transaction = new Transaction();
        $transaction->setAmount($this->amount);
        
        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setTransactions(array($transaction));
        
        $payment->create($this->getApiContext());
        
        $transactions = $payment->getTransactions();
        $relatedResources = $transactions[0]->getRelatedResources();
        $sale = $relatedResources[0]->getSale();
        return array(
            'paymentId' => $payment->getId(),
            'saleId' => $sale->getId()
        );
    }
    
    public function doRefund($saleId)
    {
        $refund = new Refund();
        $refund->setAmount($this->amount);
    
        $sale = new Sale();
        $sale->setId($saleId);
        $refundedSale = $sale->refund($refund, $this->getApiContext());
        return $refundedSale->getId();
    }
}
