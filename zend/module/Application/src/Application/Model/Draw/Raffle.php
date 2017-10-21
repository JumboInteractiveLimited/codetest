<?php

/**
 * Raffle Class
 *
 * @link      http://github.com/balri for the canonical source repository
 * @copyright Copyright (c) 2017 Blair Venn
 */

namespace Application\Model\Draw;

use Application\Model\Draw\Offer\Container as OfferContainer;
use Application\Model\Prize;
use DateTime;

/**
 * Raffle
 *
 * @author balri
 */
class Raffle extends Draw {

    /* @var $description string */
    public $description;
    
    /* @var $prize Prize */
    public $prize;
    
    /* @var $offerContainer OfferContainer */
    protected $offerContainer;
    
    /* @var $termsCondsUrl string */
    public $termsCondsUrl;
    
    /**
     * Construct object
     * 
     * @param object $draw
     */
    public function __construct($draw) {
        parent::__construct($draw);

        $this->description = $draw->description;
        $this->date = new DateTime($draw->draw_date);
        $this->stop = new DateTime($draw->draw_stop);
        $this->drawNumber = $draw->draw_number;
        $this->prize = new Prize($draw->prize);
        $this->setOffers($draw->offers);
        $this->termsCondsUrl = $draw->terms_and_conditions_url;
    }

    /**
     * Set offers
     *
     * @param OfferContainer $offers
     */
    public function setOffers($offers) {
        $this->offerContainer = new OfferContainer;
        $this->offerContainer->setOffers($offers);
    }
    
    /**
     * Get offers
     * 
     * @return array
     */
    public function getOffers() {
        return $this->offerContainer->getOffers();
    }

}
