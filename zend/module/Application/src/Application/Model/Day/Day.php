<?php

/**
 * Day Class
 *
 * @link      http://github.com/balri for the canonical source repository
 * @copyright Copyright (c) 2017 Blair Venn
 */

namespace Application\Model\Day;

/**
 * Day
 *
 * @author balri
 */
class Day {

    /* @var $name string */
    public $name;

    /* @var $value int */
    public $value;

    /**
     * Construct day
     *
     * @param object $day the day
     */
    public function __construct($day) {
        $this->name = $day->name;
        $this->value = $day->value;
    }

}
