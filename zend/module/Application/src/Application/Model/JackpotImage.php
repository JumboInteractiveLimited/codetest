<?php

/**
 * JackpotImage Class
 *
 * @link      http://github.com/balri for the canonical source repository
 * @copyright Copyright (c) 2017 Blair Venn
 */

namespace Application\Model;

/**
 * JackpotImage
 *
 * @author balri
 */
class JackpotImage {

    /* @var $imageName string */
    public $imageName;

    /* @var $imageUrl string */
    public $imageUrl;

    /* @var $svgUrl string */
    public $svgUrl;

    /* @var $imageWidth int */
    public $imageWidth;

    /* @var $imageHeight int */
    public $imageHeight;

    /* @var $contentDescription string */
    public $contentDescription;

    /**
     * Construct object
     *
     * @param object $image image
     */
    public function __construct($image) {
        $this->imageName = $image->image_name;
        $this->imageUrl = $image->image_url;
        $this->svgUrl = $image->svg_url;
        $this->imageWidth = $image->image_width;
        $this->imageHeight = $image->image_height;
        $this->contentDescription = $image->content_description;
    }

}
