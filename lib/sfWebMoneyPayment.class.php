<?php

/**
 * sfWebMoneyPayment Class
 *
 * This provides support for WebMoney to sfPaymentPlugin.
 *
 * @package   sfWebMoneyPayment
 * @category  Library
 * @author    Gnatyuk Roman aka Fozzy <fozzy@hackers.net.ua>
 */

class sfWebMoneyPayment extends sfPaymentGatewayInterface {

  public function  __construct() {
    parent::__construct();

    // translations
		$this->addFieldTranslation('VendorWallet',    'LMI_PAYEE_PURSE');
    $this->addFieldTranslation('Amount',          'LMI_PAYMENT_AMOUNT');
    $this->addFieldTranslation('ProductName',     'LMI_PAYMENT_DESC');
    $this->addFieldTranslation('ProductId',       'LMI_PAYMENT_NO');
    $this->addFieldTranslation('TestMode',        'LMI_SIM_MODE');
    // specify the url where webmoney will send result after transaction complete
    // TODO: IPN style
    $this->addFieldTranslation('Result',          'LMI_RESULT_URL');
    // specify the url where webmoney will send the user on success
    $this->addFieldTranslation('Success',    'LMI_SUCCESS_URL');
    // specify the url where webmoney will send the user on fail
    $this->addFieldTranslation('Failure',    'LMI_FAIL_URL');

    // default values of the class
		$this->gatewayUrl = 'https://merchant.webmoney.ru/lmi/payment.asp';
		$this->ipnLogFile = 'webmoney.ipn_results.log';

		// populate $fields array with a few default
		//$this->setVendorWallet(sfConfig::get('app_sf_webmoney_payment_vendor_wallet', 'U111111111111'));

		// set from config values
		$this->setSuccess(url_for(sfConfig::get('app_sf_webmoney_payment_plugin_success','sfWebMoneyPayment/success'),true));
		$this->setFailure(url_for(sfConfig::get('app_sf_webmoney_paymen_plugin_failure','sfWebMoneyPayment/failure'),true));
		$this->setResult(url_for(sfConfig::get('app_sf_webmoney_payment_plugin_result','sfWebMoneyPayment/check'),true));

		if(sfConfig::get('app_sf_webmoney_payment_plugin_wallet'))
		  $this->setVendorWallet(sfConfig::get('app_sf_webmoney_payment_plugin_wallet'));
		else
		  throw new sfException('No vendor wallet referenced in app.yml.<br />Please check the README file.');
  }

  /**
   * Enables the test mode
   *
   * @param integer $type valid test types:
   *    0: For all transactions gate will return true
   *    1: For all transactions gate will return false
   *    2: For 80% requests gate will return true, otherwise false
   * @return none
   */
  public function enableTestMode($type = 0)
  {
    $this->setTestMode($type);
  }
  /*
   * Only validate price for now
   */

  public function validateIpn(){
    // TODO: validate
  }

}
?>
