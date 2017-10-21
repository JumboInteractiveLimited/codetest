<?php

/**
 * Offer Class
 *
 * @link      http://github.com/balri for the canonical source repository
 * @copyright Copyright (c) 2017 Blair Venn
 */

namespace Application\Model\Game\Offer;

use Application\Model\Price;
use Application\Model\Set\NumberSet;

/**
 * Offer
 *
 * @author balri
 */
class Offer {

    /* @var $key string */
    public $key;

    /* @var $name string */
    public $name;

    /* @var $description string */
    public $description;

    /* @var $price Price */
    public $price;

    /* @var $minGames int */
    public $minGames;

    /* @var $maxGames int */
    public $maxGames;

    /* @var $multiple int */
    public $multiple;

    /* @var $ordered boolean */
    public $ordered;

    /* @var $gameIncrements array */
    public $gameIncrements = array();

    /* @var $equivalentGames int */
    public $equivalentGames;

    /* @var $numberSets array */
    public $numberSets = array();

    /* @var $combinations array */
    public $combinations = array();

    /* @var $displayRange mixed */
    public $displayRange;

    /**
     * Construct offer
     *
     * @param object $offer the offer
     */
    public function __construct($offer) {
        $this->key = $offer->key;
        $this->name = $offer->name;
        $this->description = $offer->description;
        $this->price = new Price($offer->price);
        $this->minGames = $offer->min_games;
        $this->maxGames = $offer->max_games;
        $this->multiple = $offer->multiple;
        $this->ordered = $offer->ordered;
        $this->setGameIncrements($offer->game_increment);
        $this->equivalentGames = $offer->equivalent_games;
        $this->setNumberSets($offer->number_sets);
        $this->setCombinations($offer->combinations);
        $this->displayRange = $offer->display_range;
    }

    /**
     * Set game increments
     *
     * @param object $gameIncrements game increments
     */
    public function setGameIncrements($gameIncrements) {
        foreach ($gameIncrements as $key => $gameIncrement) {
            $this->gameIncrements[$key] = $gameIncrement;
        }
    }

    /**
     * Set number sets
     *
     * @param array $numberSets number sets
     */
    public function setNumberSets($numberSets) {
        foreach ($numberSets as $numberSet) {
            $this->numberSets[] = new NumberSet($numberSet);
        }
    }

    /**
     * Set combinations
     *
     * @param object $combinations combinations
     */
    public function setCombinations($combinations) {
        foreach ($combinations as $key => $combination) {
            $this->combinations[$key] = $combination;
        }
    }

}
