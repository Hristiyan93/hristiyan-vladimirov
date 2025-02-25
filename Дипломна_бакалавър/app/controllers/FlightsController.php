<?php
use Payment\PaymentFactory;

class FlightsController extends Zend_Controller_Action{
    
    function listAction(){
        $prefsModel = new Models_SearchPrefs();
        $prefs = $prefsModel->getPrefs();

        $model = new Models_Routes();
        $this->view->items = $model->getResults($prefsModel->getSearch(), $prefs);
        $this->view->viewTemplate = $prefs['view'];
    }
    
    function viewAction(){
        $model = new Models_Routes();
        $route = $model->find($this->_getParam('flightId', 0))->current();
        if(!$route){
            $this->redirect('search');
        }
        $modelFligts = new Models_Flights();
        $flightIds = explode(',', $route->flights);
        $flights = array();
        foreach($flightIds as $flightId){
            $flight = $modelFligts->find($flightId)->current();
            if(!$flight){
                $this->redirect('search');
            }
            $flights[] = $flight;
        }
        $this->view->flights = $flights;
        $this->view->flight = $flights[0];
        $this->view->flightInfo = $flights[0]->getTranslation(Models_Locale::getCurrentLocale());
        $this->view->route = $route;
        $featureModel = new Models_Features();
        $this->view->featuresList = $featureModel->listItems(Models_Locale::getCurrentLocale());
        $this->view->flightFeatures = Models_FlightsFeatures::getFlightFeatures($flights[0]->id);
    }
    
    private function getPaymentProcessor(){
        $config = Zend_Registry::get('configuration');
        return PaymentFactory::getPayment($config->payment, $config);
    }
    
    function bookAction(){
        if(!Zend_Auth::getInstance()->hasIdentity()){
            $this->redirect('/');
        }
        $model = new Models_Routes();
        $route = $model->find($this->_getParam('flightId', 0))->current();
        if(!$route){
            $this->redirect('search');
        }
        $modelFligts = new Models_Flights();
        $flight = $modelFligts->find($route->flightId)->current();
        if(!$flight){
            $this->redirect('search');
        }
        
        $user = Zend_Auth::getInstance()->getIdentity();
        $error = false;
        
        if($this->getRequest()->isPost()){
            $passangers = $this->_getParam('passanger', array());
            $modelBookings = new Models_Bookings();
            $total = $route->price * count($passangers);
            $payment = $this->_getParam('payment', array());
            try{
                $paymentProcessor = $this->getPaymentProcessor();
                $paymentProcessor->setAmount($total, 'USD')
                    ->setCreditCard(
                        $payment['cardType'],
                        $payment['cardNumber'],
                        $payment['expireMonth'],
                        $payment['expireYear'],
                        $payment['cardCcv'],
                        $payment['firstname'],
                        $payment['lastname']);
                
                $paymentResult = $paymentProcessor->doPayment();
                
                $booking = $modelBookings->bookingFromRoute($user->id, $total, $route, $paymentResult['paymentId'], $paymentResult['saleId']);
                $booking->addPayment($payment);
                foreach($passangers as $passanger){
                    $booking->addPassanger($passanger);
                }
                $this->sendConfirmationEmail($user, $booking);
                $this->redirect($this->view->url(array('bookId' => $booking->id), 'thanks'));
            }catch(Exception $e){
                $error = $e->getMessage();
            }
        }else{
            $passangers = array(array_merge($user->toArray(), array('passport' => '', 'expire' => '')));
        }
        
        
        $this->view->error = $error;
        $this->view->flight = $flight;
        $this->view->route = $route;
        $this->view->users = $passangers;
    }
    
    protected function sendConfirmationEmail($user, $booking){ 
        $mailer = new Zend_Mail();
        $mailer->setFrom("info@flights.com")
            ->addTo($user->email, $user->getFullname())
            ->setSubject($this->view->translate('Reservation Confirmation Email'))
            ->setBodyHtml('Your reservation from ' . $booking->getSrcCity() . ' to ' . $booking->getDstCity() . ' has been made successfully')
            ->send();
    }
    
    function thanksAction(){
        if(!Zend_Auth::getInstance()->hasIdentity()){
            $this->redirect('/');
        }
        $model = new Models_Bookings();
        $booking = $model->find($this->_getParam('bookId', 0))->current();
        if(!$booking || $booking->userId!=Zend_Auth::getInstance()->getIdentity()->id){
            $this->redirect('/');
        }
        $this->view->booking = $booking;
    }
}