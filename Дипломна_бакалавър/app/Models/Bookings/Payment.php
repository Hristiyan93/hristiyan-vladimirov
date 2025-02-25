<?php

class Models_Bookings_Payment extends Zend_Db_Table{
    protected $_name = "bookings_payment";
    
    function deleteBookingPayment($bookingId){
        $this->delete($this->getAdapter()->quoteInto('bookingId = ?', $bookingId));
    }
}