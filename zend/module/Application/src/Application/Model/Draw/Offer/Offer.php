<?php

/**
 * Offer Class
 *
 * @link      http://github.com/balri for the canonical source repository
 * @copyright Copyright (c) 2017 Blair Venn
 */

namespace Application\Model\Draw\Offer;

use Application\Model\BonusPrize;
use Application\Model\Price;

/**
 * Offer
 *
 * @author balri
 */
class Offer {

    /* @var $key string */
    public $key;

    /* @var $name string */
    public $name;

    /* @var $numTickets string */
    public $numTickets;

    /* @var $price Price */
    public $price;

    /* @var $pricePerTicket Price */
    public $pricePerTicket;

    /* @var $ribbon string */
    public $ribbon;

    /* @var $bonusPrize BonusPrize */
    public $bonusPrize;

    /**
     * Construct offer
     *
     * @param object $offer the offer
     */
    public function __construct($offer) {
        $this->key = $offer->key;
        $this->name = $offer->name;
        $this->numTickets = $offer->num_tickets;
        $this->price = new Price($offer->price);
        $this->pricePerTicket = new Price($offer->price_per_ticket);
        $this->ribbon = $offer->ribbon;

        if ($offer->bonus_prize) {
            $this->bonusPrize = new BonusPrize($offer->bonus_prize);
        }
    }

}
