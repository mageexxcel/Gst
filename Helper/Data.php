<?php
/**
 * Copyright © 2015 Excellence . All rights reserved.
 */
namespace Excellence\Gst\Helper;

use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Class Data
 * @package Excellence\Gst\Helper
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var \Magento\Catalog\Model\Product
     */
    protected $_productModel;
    /**
     * @var $_scopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * Data constructor.
     * @param Context $context
     * @param \Magento\Catalog\Model\Product $productModel
     */
    public function __construct(
        Context $context,
        \Magento\Catalog\Model\Product $productModel
    ){
        $this->scopeConfig = $context->getScopeConfig();
        $this->_productModel = $productModel;
        parent::__construct($context);
    }

    /**
     * This function will return Store production state
     * @param null
     * @return string
     */
    public function getProductionState(){
        return $this->scopeConfig->getValue('gst/excellence/production_state', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * This function will return module status 0/1
     * @param null
     * @return boolean
     */
    public function getModuleStatus()
    {
        return $this->scopeConfig->getValue('gst/excellence/status', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * This function will return client Gstin Number
     * @param null
     * @return boolean
     */
    public function getClientGstin()
    {
        return $this->scopeConfig->getValue('gst/excellence/gstin', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * @param $productId
     * @return $this
     */
    public function getProductById($productId){
        $productData = $this->_productModel->load($productId);
        return $productData;
    }

    /**
     * This function will return Tax configuration values
     * @param $id
     * @return boolean|int|string
     */
    public function getTaxConfigurationValues($id)
    {
        return $this->scopeConfig->getValue($id, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * This function will return module status 0/1
     * @param null
     * @return boolean
     */
    public function getShippingGstStatus()
    {
        return $this->scopeConfig->getValue('gst/excellence/shipping_status', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

}
