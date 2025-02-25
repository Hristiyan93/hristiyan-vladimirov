<?php

class Models_Bookings extends Zend_Db_Table{
    protected $_name = 'bookings';
    protected $_rowClass = 'Models_Wrapper_Booking';
    
    const STATUS_BOOKED = 'booked';
    const STATUS_CANCELED = 'cancelled';
    
    function bookingFromRoute($userId, $price, $route, $paymentId, $saleId){
        $bookInfo = array(
            'userId' => $userId,
            'date' => date('Y-m-d H:i:s'),
            'srcPort' => $route->srcPort,
            'dstPort' => $route->dstPort,
            'departure' => $route->departure,
            'arrival' => $route->arrival,
            'duration' => $route->duration,
            'stops' => $route->stops,
            'flightId' => $route->flightId,
            'flights' => $route->flights,
            'price' => $route->price,
            'totalPrice' => $price,
            'status' => self::STATUS_BOOKED,
            'paymentId' => $paymentId,
            'saleId' => $saleId,
            'refundId' => ''
        );
        $book = $this->createRow($bookInfo);
        $book->save();
        return $book;
    }
    
    function getUserBookings($userId){
        return $this->fetchAll($this->select()->where('userId = ?', $userId)->where('departure > ?', date('Y-m-d')));
    }
    
    function cancelBooking($bookingId){
        $booking = $this->find($bookingId)->current();
        if($booking){
            $booking->cancel();
        }
    }
}