<?php

/**
 * Lottery Ticket Class
 *
 * @link      http://github.com/balri for the canonical source repository
 * @copyright Copyright (c) 2017 Blair Venn
 */

namespace Application\Model\Ticket;

use Application\Model\Day\Container as DayContainer;
use Application\Model\Draw\Container as DrawContainer;
use Application\Model\Game\Container as GameContainer;

/**
 * Lottery Ticket
 *
 * @author balri
 */
class LotteryTicket extends Ticket {

    /* @var $type string */
    public $type = 'Lottery';

    /* @var $gameContainer GameContainer */
    protected $gameContainer;

    /* @var $drawContainer DrawContainer */
    public $drawContainer;

    /* @var $dayContainer DayContainer */
    public $dayContainer;

    /* @var $addons array */
    public $addons;

    /* @var $quickpickSizes array */
    public $quickpickSizes;

    /**
     * Construct lottery ticket
     *
     * @param object $ticket the ticket
     */
    public function __construct($ticket) {
        parent::__construct($ticket);

        $this->setGames($ticket->game_types);
        $this->setDraws($ticket->draws);
        $this->setDays($ticket->days);
        $this->addons = $ticket->addons;
        $this->quickpickSizes = $ticket->quickpick_sizes;
    }

    /**
     * Set games
     *
     * @param array $gameTypes game types
     */
    public function setGames($gameTypes) {
        $this->gameContainer = new GameContainer;
        $this->gameContainer->setGames($gameTypes);
    }

    /**
     * Get games
     *
     * @return array
     */
    public function getGames() {
        return $this->gameContainer->getGames();
    }

    /**
     * Get game
     *
     * @param string $key game key
     *
     * @return mixed
     */
    public function getGame($key) {
        $games = $this->getGames();

        if (array_key_exists($key, $games)) {
            return $games[$key];
        }

        return null;
    }

    /**
     * Set draws
     *
     * @param array $draws draws
     */
    public function setDraws($draws) {
        $this->drawContainer = new DrawContainer;
        $this->drawContainer->setDraws($draws);
    }

    /**
     * Get draws
     *
     * @return array
     */
    public function getDraws() {
        return $this->drawContainer->getDraws();
    }

    /**
     * Get draw
     *
     * @param string $key draw key
     *
     * @return mixed
     */
    public function getDraw($key) {
        $draws = $this->getDraws();

        if (array_key_exists($key, $draws)) {
            return $draws[$key];
        }

        return null;
    }

    /**
     * Set days
     *
     * @param array $days days
     */
    public function setDays($days) {
        $this->dayContainer = new DayContainer;
        $this->dayContainer->setDays($days);
    }

    /**
     * Get days
     *
     * @return array
     */
    public function getDays() {
        return $this->dayContainer->getDays();
    }

}
