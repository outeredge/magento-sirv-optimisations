<?php

namespace OuterEdge\SirvOptimisations\Block;

use Magento\Framework\View\Element\Template;

class MediaUrl extends Template
{
    public function getMediaUrl()
    {
        $mediaUrl = $this ->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        if ($mediaUrl) {
            $parsedUrl = parse_url($mediaUrl);
            $url = $parsedUrl['scheme'] . '://' . $parsedUrl['host'];

            return $url;
        }
        return null;
    }
}
?>
