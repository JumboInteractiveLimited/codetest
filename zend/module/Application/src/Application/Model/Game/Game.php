<?php

/**
 * Game Class
 *
 * @link      http://github.com/balri for the canonical source repository
 * @copyright Copyright (c) 2017 Blair Venn
 */

namespace Application\Model\Game;

use Application\Model\Game\Offer\Container as OfferContainer;

/**
 * Game
 *
 * @author balri
 */
class Game {

    /* @var $key string */
    public $key;

    /* @var $name string */
    public $name;

    /* @var $description string */
    public $description;

    /* @var $offerContainer OfferContainer */
    protected $offerContainer;

    /**
     * Construct game type
     *
     * @param object $game the game type
     */
    public function __construct($game) {
        $this->key = $game->key;
        $this->name = $game->name;
        $this->description = $game->description;
        $this->setOffers($game->game_offers);
    }

    /**
     * Set offers
     *
     * @param array $offers
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

    /**
     * Get specified offer
     *
     * @param string $key
     *
     * @return null
     */
    public function getOffer($key) {
        $offers = $this->getOffers();

        if (array_key_exists($key, $offers)) {
            return $offers[$key];
        }

        return null;
    }

}
