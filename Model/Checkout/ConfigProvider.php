<?php
/**
 * Copyright © 2015 Excellence . All rights reserved.
 */
namespace Excellence\Gst\Model\Checkout;
use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\StoreManagerInterface;
class ConfigProvider implements ConfigProviderInterface
{
    /**
     * @var StoreManagerInterface
     */
    protected $_storeManager;
    /**
     * @var ScopeConfigInterface
     */
    protected $_scopeConfig;

    /**
     * ConfigProvider constructor.
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        StoreManagerInterface $storeManagerInterface,
        ScopeConfigInterface $scopeConfig
    ) {
        $this->_storeManager = $storeManagerInterface;
        $this->_scopeConfig = $scopeConfig;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        $baseUrl = $this->_storeManager->getStore()->getBaseUrl();
        $config = [];
        try {
            $config['Excellence_Gst']['production_state'] = $this->_scopeConfig->getValue('gst/excellence/production_state', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
            $config['Excellence_Gst']['status'] = $this->_scopeConfig->getValue('gst/excellence/status', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
            $config['Excellence_Gst']['gstin'] = $this->_scopeConfig->getValue('gst/excellence/gstin', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
            $config['Excellence_Gst']['shipping_status'] = $this->_scopeConfig->getValue('gst/excellence/shipping_status', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
            $config['Excellence_Gst']['baseUrl'] = $baseUrl;
            return $config;
        }catch(\Exception $e){

        }
    }


}
