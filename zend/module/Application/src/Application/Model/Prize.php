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
class Prize {

    /* @var $type string */
    public $type;

    /* @var $cardTitle string */
    public $cardTitle;

    /* @var $name string */
    public $name;

    /* @var $description string */
    public $description;

    /* @var $content PrizeContent */
    public $content;

    /* @var $value Price */
    public $value;

    /* @var $valueIsExact boolean */
    public $valueIsExact;

    /* @var $heroImage string */
    public $heroImage;

    /* @var $carouselImages array */
    public $carouselImages;

    /* @var $featureDrawImage string */
    public $featureDrawImage;

    /* @var $edmImage string */
    public $edmImage;

    /**
     * Construct object
     *
     * @param object $prize
     */
    public function __construct($prize) {
        $this->type = $prize->type;
        $this->cardTitle = $prize->card_title;
        $this->name = $prize->name;
        $this->description = $prize->description;
        $this->content = new PrizeContent($prize->content);
        $this->value = new Price($prize->value);
        $this->valueIsExact = $prize->value_is_exact;
        $this->heroImage = $prize->hero_image;
        $this->carouselImages = $prize->carousel_images;
        $this->featureDrawImage = $prize->feature_draw_image;
        $this->edmImage = $prize->edm_image;
    }
}
