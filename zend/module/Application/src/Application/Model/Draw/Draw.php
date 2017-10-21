<?php

/**
 * Draw Class
 *
 * @link      http://github.com/balri for the canonical source repository
 * @copyright Copyright (c) 2017 Blair Venn
 */

namespace Application\Model\Draw;

/**
 * Draw
 *
 * @author balri
 */
abstract class Draw {

    /* @var $name string */
    public $name;

    /* @var $date DateTime */
    public $date;

    /* @var $stop DateTime */
    public $stop;

    /* @var $drawNumber int */
    public $drawNumber;

    /**
     * Construct draw 
     *
     * @param object $draw the draw 
     */
    public function __construct($draw) {
        $this->name = $draw->name;
    }

}
