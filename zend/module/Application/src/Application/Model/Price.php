<?php

/**
 * Price Class
 *
 * @link      http://github.com/balri for the canonical source repository
 * @copyright Copyright (c) 2017 Blair Venn
 */

namespace Application\Model;

/**
 * Price
 *
 * @author balri
 */
class Price {

    /* @var $amount float */
    public $amount;

    /* @var $currency string */
    public $currency;

    /**
     * Construct object
     *
     * @param object $price
     */
    public function __construct($price) {
        $this->amount = (float)$price->amount;
        $this->currency = $price->currency;
    }
}
