<?php
abstract class BasesfWebMoneyPaymentActions extends sfActions
{
  public function executeSample(sfWebRequest $request)
  {
  }

  public function executeSuccess(sfWebRequest $request)
  {
    //$this->executeIpn($request);
  }

  public function executeFailure(sfWebRequest $request)
  {
    $this->transactionCanceled($request);
  }

  public function executeIpn(sfWebRequest $request)
  {
  }

  /**
   * Transaction verified and completed
   *
   * @param array $post_parameters
   */
  abstract public function transactionCompleted(sfWebRequest $request);

  /**
   * Transaction verified and failed
   *
   * @param array $post_parameters
   */
  abstract public function transactionFailed(sfWebRequest $request);

  /**
   * Transaction invalid (not verified)
   *
   * @param array $post_parameters
   */
  abstract public function transactionInvalid(sfWebRequest $request);

  /**
   * Transaction canceled (explicitly by user)
   *
   * @param array $post_parameters
   */
  abstract public function transactionCanceled(sfWebRequest $request);
}
