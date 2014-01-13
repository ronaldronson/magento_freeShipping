<?php
class Rrr_Freeshipping_Block_Onepage_Shipping_Method_Available
    extends Mage_Checkout_Block_Onepage_Shipping_Method_Available
{
    protected $_freeShipping = null;
    public function getShippingRates()
    {
        $rates = parent::getShippingRates();
        if (array_key_exists('newshipping', $rates)) {
            $rates = array('newshipping' => $rates['newshipping']);
            $this->_freeShipping = $rates['newshipping'];
        }

        return $rates;
    }
}