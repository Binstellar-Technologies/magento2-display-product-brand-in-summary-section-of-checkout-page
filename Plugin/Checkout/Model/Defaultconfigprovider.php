<?php

namespace Binstellar\CheckoutBrand\Plugin\Checkout\Model;

use Magento\Checkout\Model\Session as CheckoutSession;

class Defaultconfigprovider
{
    
    /**
    * @var CheckoutSession
    */
    
    protected $checkoutSession;
    
    /**
    * Constructor
    *
    * @param CheckoutSession $checkoutSession
    */
    
    public function __construct(CheckoutSession $checkoutSession)
    {
        $this->checkoutSession = $checkoutSession;
    }

    public function afterGetConfig(\Magento\Checkout\Model\DefaultConfigProvider $subject, array $result)
    {
        
        $items = $result['totalsData']['items'];
        
        foreach ($items as $index => $item) {
            
            $quoteItem = $this->checkoutSession->getQuote()->getItemById($item['item_id']);
            
            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $product       = $objectManager->create('Magento\Catalog\Model\Product')->load($quoteItem->getProduct()->getId());
            
            if ($product->getCustomAttributes()) {
                $attribute_value = $product->getCustomAttribute('brand') ? $product->getCustomAttribute('brand')->getValue() : '';
            }
            $result['quoteItemData'][$index]['brand'] = $attribute_value;
        }
        return $result;
    }   
}