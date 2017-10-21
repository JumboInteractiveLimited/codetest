<?php

/**
 * BonusPrize Class
 *
 * @link      http://github.com/balri for the canonical source repository
 * @copyright Copyright (c) 2017 Blair Venn
 */

namespace Application\Model;

/**
 * BonusPrize
 *
 * @author balri
 */
class BonusPrize {

    /* @var $description string */
    public $description;

    /* @var $image string */
    public $image;

    /**
     * Construct object
     *
     * @param object $bonusPrize
     */
    public function __construct($bonusPrize) {
        $this->description = $bonusPrize->description;
        $this->image = $bonusPrize->image;
    }
}
