<?php

/**
 * Hide Price helper
 *
 * @category Ansh
 * @package  Ansh_HidePrice
 * @author   Ansh <easternenterprisebv@gmail.com>
 */
class Ansh_HidePrice_Helper_Data extends Mage_Core_Helper_Abstract {

    /**
     * Retrieve status of HidePriceextension
     *
     * @return string
     */
    public function hidePriceForGuestsEnabled() {
        $status = Mage::getStoreConfig('hideprice_options/general/enabled');

        return $status;
    }

    /**
     * Retrieve Login Url
     *
     * @return string
     */
    public function getLoginUrl() {
        return Mage::getUrl('customer/account/login');
    }

    /**
     * Check Customer is Logged In
     *
     * @return boolean
     */
    public function getCustomerIsLoggedIn() {

        $hidePriceEnabled = $this->hidePriceForGuestsEnabled();

        if ($hidePriceEnabled) { //if extension is enabled
            if (Mage::getSingleton('customer/session')->isLoggedIn()) {
                return true;
            } else {
                return false;
            }
        } else { //if extension is disabled
            /*
             *  If Hide price is disabled then Price,Add to wishlist 
             * and Add to compare should be visible to non loggedin users           
             *  */
            return true; 
        }
    }

}
