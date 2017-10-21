<?php

/**
 * Container Class
 *
 * @link      http://github.com/balri for the canonical source repository
 * @copyright Copyright (c) 2017 Blair Venn
 */

namespace Application\Model\Day;

/**
 * Container
 *
 * @author balri
 */
class Container {

    /* @var $days array */
    protected $days;

    /**
     * Store days for ticket
     *
     * @param array $days list of days
     */
    public function setDays($days) {
        foreach ($days as $day) {
            $this->days[] = new Day($day);
        }
    }

    /**
     * Get days
     *
     * @return array
     */
    public function getDays() {
        return $this->days;
    }

}

