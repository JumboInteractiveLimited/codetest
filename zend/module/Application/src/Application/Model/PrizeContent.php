<?php

/**
 * Prize Class
 *
 * @link      http://github.com/balri for the canonical source repository
 * @copyright Copyright (c) 2017 Blair Venn
 */

namespace Application\Model;

/**
 * Prize
 *
 * @author balri
 */
class PrizeContent {

    /* @var $salesPitchHeading1 string */
    public $salesPitchHeading1;

    /* @var $salesPitchSubHeading1 string */
    public $salesPitchSubHeading1;

    /* @var $paragraph1 string */
    public $paragraph1;

    /* @var $paragraph2 string */
    public $paragraph2;

    /* @var $paragraph3 string */
    public $paragraph3;

    /* @var $image string */
    public $image;

    /* @var $salesPitchHeading2 string */
    public $salesPitchHeading2;

    /* @var $salesPitchSubHeading2 string */
    public $salesPitchSubHeading2;

    /* @var $features array */
    public $features;

    /**
     * Construct object
     *
     * @param object $prize
     */
    public function __construct($prize) {
        $this->salesPitchHeading1 = $prize->sales_pitch_heading_1;
        $this->salesPitchSubHeading1 = $prize->sales_pitch_sub_heading_1;
        $this->paragraph1 = $prize->paragraph_1;
        $this->paragraph2 = $prize->paragraph_2;
        $this->paragraph3 = $prize->paragraph_3;
        $this->image = $prize->image;
        $this->salesPitchHeading2 = $prize->sales_pitch_heading_2;
        $this->salesPitchSubHeading2 = $prize->sales_pitch_sub_heading_2;
        $this->features = $prize->features;
    }
}
