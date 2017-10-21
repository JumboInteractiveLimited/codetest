<?php

/**
 * NumberSet Class
 *
 * @link      http://github.com/balri for the canonical source repository
 * @copyright Copyright (c) 2017 Blair Venn
 */

namespace Application\Model\Set;

/**
 * NumberSet
 *
 * @author balri
 */
class NumberSet {

    /* @var $first int */
    public $first;

    /* @var $last int */
    public $last;

    /* @var $sets array */
    public $sets;

    /**
     * Construct object
     *
     * @param object $numberSet number set
     */
    public function __construct($numberSet) {
        $this->first = $numberSet->first;
        $this->last = $numberSet->last;
        $this->setSets($numberSet->sets);
    }

    /**
     * Set sets
     *
     * @param array $sets sets
     */
    public function setSets($sets) {
        foreach ($sets as $set) {
            $this->sets[] = new Set($set);
        }
    }
}
