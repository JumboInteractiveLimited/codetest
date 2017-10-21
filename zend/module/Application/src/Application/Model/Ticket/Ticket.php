<?php

/**
 * Ticket Class
 *
 * @link      http://github.com/balri for the canonical source repository
 * @copyright Copyright (c) 2017 Blair Venn
 */

namespace Application\Model\Ticket;

/**
 * Ticket
 *
 * @author balri
 */
abstract class Ticket {

    /* @var $key string */
    public $key;

    /* @var $name string */
    public $name;

    /* @var $type string */
    public $type;

    /* @var $autoplayable string */
    public $autoplayable;
    
    /**
     * Construct ticket
     *
     * @param object $ticket the ticket
     */
    public function __construct($ticket) {
        $this->key = $ticket->key;
        $this->name = $ticket->name;
        $this->autoplayable = $ticket->autoplayable;
    }

}
