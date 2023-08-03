<?php
/**
 * outer/edge Sirv Optimisations Media Url
 */
namespace OuterEdge\SirvOptimisations\Block;

use Magento\Framework\View\Element\Template;

class MediaUrl extends Template
{
    public function getMediaUrl()
    {
        return $this ->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
    }
}
?>