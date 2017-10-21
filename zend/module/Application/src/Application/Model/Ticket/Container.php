<?php

/**
 * Container Class
 *
 * @link      http://github.com/balri for the canonical source repository
 * @copyright Copyright (c) 2017 Blair Venn
 */

namespace Application\Model\Ticket;

use Application\Model\Ticket\Factory as TicketFactory;

/**
 * Container
 *
 * @author balri
 */
class Container {

    /* @var $tickets array */
    protected $tickets = array();

    /**
     * Store tickets from remote server
     *
     * @param array $tickets tickets from remote service
     */
    public function setTickets(array $tickets) {
        foreach ($tickets as $ticket) {
            $this->tickets[$ticket->key] = TicketFactory::getInstance($ticket);
        }
    }
    
    /**
     * Get all tickets
     * 
     * @return array
     */
    public function getTickets() {
        return $this->tickets;
    }
    
    /**
     * Get ticket specified by key
     * 
     * @param string $key ticket key
     * 
     * @return array|null
     */
    public function getTicket($key) {
        $tickets = $this->getTickets();
        
        if (array_key_exists($key, $tickets)) {
            return $tickets[$key];
        }
        
        return null;
    }

}

