<?php
require_once(sfConfig::get('sf_plugins_dir'). '/sfWebMoneyPaymentPlugin/modules/sfWebMoneyPayment/lib/BasesfWebMoneyPaymentActions.class.php');

class sfWebMoneyPaymentActions extends BasesfWebMoneyPaymentActions
{
  /**
   * Transaction verified and completed
   *
   * @param array $post_parameters
   */
  public function transactionCompleted(sfWebRequest $request)
  {

  }

  /**
   * Transaction verified and failed
   *
   * @param array $post_parameters
   */
  public function transactionFailed(sfWebRequest $request)
  {

  }

  /**
   * Transaction invalid (not verified)
   *
   * @param array $post_parameters
   */
  public function transactionInvalid(sfWebRequest $request)
  {

  }

  /**
   * Transaction canceled (explicitly by user)
   *
   * @param array $post_parameters
   */
  public function transactionCanceled(sfWebRequest $request)
  {

  }
}