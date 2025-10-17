<?php

namespace OuterEdge\SirvOptimisations\Block;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Template;

class MediaUrl extends Template
{
    public function getMediaUrl()
    {
        $mediaUrl = $this ->_storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA);
        
        if ($mediaUrl) {
            $parsedUrl = parse_url($mediaUrl);
            $mediaUrl  = isset($parsedUrl['scheme']) ? $parsedUrl['scheme'] . '://' . $parsedUrl['host'] : $mediaUrl;
        }
        
        return $mediaUrl;
    }
}
