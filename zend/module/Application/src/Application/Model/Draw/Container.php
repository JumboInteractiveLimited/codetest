<?php

/**
 * Container Class
 *
 * @link      http://github.com/balri for the canonical source repository
 * @copyright Copyright (c) 2017 Blair Venn
 */

namespace Application\Model\Draw;

/**
 * Container
 *
 * @author balri
 */
class Container {

    /* @var $draws array */
    protected $draws;

    /**
     * Store draws for ticket
     *
     * @param array $draws list of draws
     */
    public function setDraws($draws) {
        foreach ($draws as $draw) {
            $this->draws[] = new Lottery($draw);
        }
    }

    /**
     * Get draws
     *
     * @return array
     */
    public function getDraws() {
        return $this->draws;
    }

}

