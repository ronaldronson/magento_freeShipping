<?php
class Rrr_FreeShipping_Model_Carrier_Post
    extends Mage_Shipping_Model_Carrier_Abstract
    implements Mage_Shipping_Model_Carrier_Interface
{

    protected $_code = 'newshipping';

    /**
     * @param Mage_Shipping_Model_Rate_Request $request
     * @internal param Mage_Shipping_Model_Rate_Request $data
     * @return Mage_Shipping_Model_Rate_Result
     */
    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
        if (!$this->getConfigFlag('active')) {
            return false;
        }

        /** @var $result Mage_Shipping_Model_Rate_Result */
        $result = Mage::getModel('shipping/rate_result');

        $this->_updateFreeMethodQuote($request);

        /** add rrr_freeshipping */
        if (($request->getFreeShipping())
            || ($request->getBaseSubtotalInclTax() >= $this->getConfigData('freeshipping_subtotal'))
        ) {
            /** @var $method Mage_Shipping_Model_Rate_Result_Method */
            $method = Mage::getModel('shipping/rate_result_method');

            $method->setCarrier($this->_code);
            $method->setCarrierTitle($this->getConfigData('title'));

            $method->setMethod($this->_code);
            $method->setMethodTitle($this->getConfigData('name'));

            $method->setPrice('0.00');
            $method->setCost('0.00');

            $result->append($method);
        }

        return $result;
    }

    public function getAllowedMethods()
    {
        return array($this->_code => $this->getConfigData('name'));
    }
}
