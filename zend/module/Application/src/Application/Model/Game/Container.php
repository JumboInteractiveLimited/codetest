<?php

/**
 * Container Class
 *
 * @link      http://github.com/balri for the canonical source repository
 * @copyright Copyright (c) 2017 Blair Venn
 */

namespace Application\Model\Game;

/**
 * Container
 *
 * @author balri
 */
class Container {

    /* @var $games array */
    protected $games;

    /**
     * Store games for ticket
     *
     * @param array $games list of games
     */
    public function setGames($games) {
        foreach ($games as $game) {
            $this->games[$game->key] = new Game($game);
        }
    }

    /**
     * Get games
     *
     * @return array
     */
    public function getGames() {
        return $this->games;
    }
}

