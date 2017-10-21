<?php

/**
 * Lottery Class
 *
 * @link      http://github.com/balri for the canonical source repository
 * @copyright Copyright (c) 2017 Blair Venn
 */

namespace Application\Model\Draw;

use Application\Model\JackpotImage;
use Application\Model\PrizePool;
use DateTime;

/**
 * Lottery
 *
 * @author balri
 */
class Lottery extends Draw {

    /* @var $prizePool PrizePool */
    public $prizePool;

    /* @var $jackpotImage JackpotImage */
    public $jackpotImage;

    /**
     * Construct object
     *
     * @param object $draw
     */
    public function __construct($draw) {
        parent::__construct($draw);

        $this->date = new DateTime($draw->date);
        $this->stop = new DateTime($draw->stop);
        $this->drawNumber = $draw->draw_no;
        $this->prizePool = new PrizePool($draw->prize_pool);
        $this->jackpotImage = new JackpotImage($draw->jackpot_image);
    }
}
