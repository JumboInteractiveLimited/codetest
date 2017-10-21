<?php

/**
 * Set Class
 *
 * @link      http://github.com/balri for the canonical source repository
 * @copyright Copyright (c) 2017 Blair Venn
 */

namespace Application\Model\Set;

/**
 * Set
 *
 * @author balri
 */
class Set {

    /* @var $name string */
    public $name;

    /* @var $count int */
    public $count;

    /**
     * Construct object
     * 
     * @param object $set set
     */
    public function __construct($set) {
        $this->name = $set->name;
        $this->count = $set->count;
    }
}
