<?php
/**
 * Copyright © 2015 Excellence . All rights reserved.
 */
namespace Excellence\Gst\Block\Adminhtml;

use Magento\Framework\View\Element\Template;

class ProductionState extends Template
{
    /**
     * @var $_scopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * Data constructor.
     * @param Context $context
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context
    ){
        $this->scopeConfig = $context->getScopeConfig();
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
     * This function will return module status 0/1
     * @param null
     * @return boolean
     */
    public function getShippingGstStatus()
    {
        return $this->scopeConfig->getValue('gst/excellence/shipping_status', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}