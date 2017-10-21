<?php

/**
 * Raffle Ticket Class
 *
 * @link      http://github.com/balri for the canonical source repository
 * @copyright Copyright (c) 2017 Blair Venn
 */

namespace Application\Model\Ticket;

use Application\Model\Lottery;
use Application\Model\Draw\Raffle as Draw;

/**
 * Raffle Ticket
 *
 * @author balri
 */
class RaffleTicket extends Ticket {

    /* @var $type string */
    public $type = 'Raffle';

    /* @var $lottery Lottery */
    public $lottery;

    /* @var $draw Draw */
    public $draw;

    /**
     * Construct raffle ticket
     *
     * @param object $ticket
     */
    public function __construct($ticket) {
        parent::__construct($ticket);

        $this->lottery = new Lottery($ticket->lottery);
        $this->draw = new Draw($ticket->draw);
    }

}
