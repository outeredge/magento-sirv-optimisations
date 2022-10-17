<?php

namespace OuterEdge\SirvOptimisations\Model\View\Asset;

use Sirv\Magento2\Model\View\Asset\Image as SirvImage;

class Image extends SirvImage
{
    /*
     * Apply crop trim to all images
     */
    protected function getUrlQuery($absPath)
    {
        $query = parent::getUrlQuery($absPath);

        if (empty($query) || (
            !stristr($absPath, '/catalog/product/') &&
            !stristr($absPath, '/catalog/category/')
        )) {
            return $query;
        }

        return $query . '&crop.type=trim';
    }
}
