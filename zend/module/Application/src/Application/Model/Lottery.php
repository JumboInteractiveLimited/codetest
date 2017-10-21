<?php

/**
 * Lottery Class
 *
 * @link      http://github.com/balri for the canonical source repository
 * @copyright Copyright (c) 2017 Blair Venn
 */

namespace Application\Model;

/**
 * Lottery
 *
 * @author balri
 */
class Lottery {

    /* @var $id string */
    public $id;

    /* @var $name string */
    public $name;

    /* @var $description string */
    public $description;

    /* @var $multidraw boolean */
    public $multidraw;

    /* @var $type string */
    public $type;

    /* @var $iconUrl string */
    public $iconUrl;

    /* @var $iconWhiteUrl string */
    public $iconWhiteUrl;

    /* @var $playUrl string */
    public $playUrl;

    /* @var $lotteryID int */
    public $lotteryID;

    /**
     * Construct object
     *
     * @param object $lottery
     */
    public function __construct($lottery) {
        $this->id = $lottery->id;
        $this->name = $lottery->name;
        $this->description = $lottery->desc;
        $this->multidraw = $lottery->multidraw;
        $this->type = $lottery->type;
        $this->iconUrl = $lottery->icon_url;
        $this->iconWhiteUrl = $lottery->icon_white_url;
        $this->playUrl = $lottery->play_url;
        $this->lotteryID = $lottery->lottery_id;
    }

}
