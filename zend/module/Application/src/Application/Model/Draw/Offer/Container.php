<?php

/**
 * Container Class
 *
 * @link      http://github.com/balri for the canonical source repository
 * @copyright Copyright (c) 2017 Blair Venn
 */

namespace Application\Model\Draw\Offer;

/**
 * Container
 *
 * @author balri
 */
class Container {

    /* @var $offers array */
    protected $offers;

    /**
     * Store offers for draw
     *
     * @param array $offers list of offers
     */
    public function setOffers($offers) {
        foreach ($offers as $offer) {
            $this->offers[$offer->key] = new Offer($offer);
        }
    }
    
    /**
     * Get offers
     * 
     * @return array
     */
    public function getOffers() {
        return $this->offers;
    }

}

