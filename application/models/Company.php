<?php

class Company extends ActiveRecord\Model {
	static $has_many = array(
	    array('clients', 'conditions' => 'inactive != 1'),
        array('invoices'),
        array('invoice_has_addresses'),
        array('projects'),
        array('subscriptions')
    );

    static $belongs_to = array(
    array('client', 'conditions' => 'inactive != 1')
    );
}