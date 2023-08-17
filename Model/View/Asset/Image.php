<?php

namespace OuterEdge\SirvOptimisations\Model\View\Asset;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Catalog\Model\Product\Media\ConfigInterface;
use Sirv\Magento2\Model\View\Asset\Image\Context;
use Magento\Framework\Encryption\EncryptorInterface;
use Sirv\Magento2\Model\View\Asset\Image as SirvImage;

class Image extends SirvImage
{
    protected $scopeConfig;

    public function __construct(
        ConfigInterface $mediaConfig,
        Context $context,
        EncryptorInterface $encryptor,
        ScopeConfigInterface $scopeConfig,
        $filePath,
        array $miscParams = []
    ) {
        parent::__construct(
            $mediaConfig,
            $context,
            $encryptor,
            $scopeConfig,
            $filePath,
            $miscParams
        );
    }

    /*
     * Apply crop trim to all images
     */
    protected function getUrlQuery($absPath)
    {
        $enableCropTrim = $this->scopeConfig->getValue(
            'oe_sirv/settings/enable_crop_trim',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
        );

        if (!$enableCropTrim) {
            parent::getUrlQuery($absPath);
        }

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
