<?php

class Models_Bookings_Passangers extends Zend_Db_Table{
    protected $_name = 'bookings_passangers';
    
    function getPassangers($bookingId){
        return $this->fetchAll($this->select()->where('bookingId = ?', $bookingId));
    }
}