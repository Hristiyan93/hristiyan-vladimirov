<?php
use Payment\PaymentFactory;

class Models_Wrapper_Booking extends Zend_Db_Table_Row{
    
    /**
     * 
     * @var Models_Bookings_Passangers
     */
    protected $modelPassangers;
    /**
     * 
     * @var Models_Bookings_Payment
     */
    protected $modelPayment;
    protected $fromAirportName;
    protected $toAirportName;
    
    protected function getPassangerModel(){
        if(empty($this->modelPassangers)){    
            $this->modelPassangers = new Models_Bookings_Passangers();
        }
        return $this->modelPassangers;
    }
    
    protected function getPaymentModel(){
        if(empty($this->modelPayment)){
            $this->modelPayment = new Models_Bookings_Payment();
        }
        return $this->modelPayment;
    }
    
    function addPassanger($passangerInfo){
        if(isset($passangerInfo['expire'])){
            $passangerInfo['expire'] = date('Y-m-d', strtotime($passangerInfo['expire']));
        }
        $model = $this->getPassangerModel();
        $passanger = $model->createRow($passangerInfo);
        $passanger->bookingId = $this->id;
        $passanger->save();
    }
    
    function addPayment($paymentInfo){
        $model = $this->getPaymentModel();
        $model->deleteBookingPayment($this->id);
        $payment = $model->createRow($paymentInfo);
        $payment->bookingId = $this->id;
        $payment->save();
    }
    
    function getPassangers(){
        $model = $this->getPassangerModel();
        return $model->getPassangers($this->id);
    }
    
    function getBookId(){
        return sprintf("B%04u/%06u", $this->id, date('ymd', strtotime($this->date)));
    }
    
    public function getSrcCity(){
        if(empty($this->fromAirportName)){
            $this->fromAirportName = Models_Airports::getCityName($this->srcPort);
        }
        return $this->fromAirportName;
    }
    
    public function getDstCity(){
        if(empty($this->toAirportName)){
            $this->toAirportName = Models_Airports::getCityName($this->dstPort);
        }
        return $this->toAirportName;
    }
    
    public function getClientName(){
        $model = new Models_Users();
        $user = $model->find($this->userId)->current();
        if($user){
            return $user->getFullname();
        }
        return '-';
    }
    
    public function getMainFlight(){
        $model = new Models_Flights();
        return $model->findItem($this->flightID);
    }
    
    private function doPayment($amount){
        $config = Zend_Registry::get('configuration');
        $paymentProcessor = PaymentFactory::getPayment($config->payment, $config);
        $paymentProcessor->setAmount($amount, 'USD');
        try{
            return $paymentProcessor->doRefund($this->saleId);
        }catch(Exception $e){
        }
        return false;
    }
    
    public function cancel(){
        if($this->status==Models_Bookings::STATUS_CANCELED)return;
        $flight = $this->getMainFlight();
        $passangersCount = $this->getPassangers()->count();
        
        $amountToReturn = $this->totalPrice - $flight->cancelPrice * $passangersCount;
        if($amountToReturn>0){
            $refundId = $this->doPayment($amountToReturn);
        }else{
            $refundId = "NTR";
        }
        
        if($refundId!==false){
            $this->refundId = $refundId;
            $this->status = Models_Bookings::STATUS_CANCELED;
            $this->save();
        }
    }
}