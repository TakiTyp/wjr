<?php

/**
 * info actions.
 *
 * @package    wjr
 * @subpackage info
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class infoActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  //public function executeIndex(sfWebRequest $request)
  //{
  //  $this->forward('default', 'module');
  //}

  public function executeShow(sfWebRequest $request)
  {
  	//$this->category = $this->getRoute()->getObject();
    $this->wjr_info = Doctrine_Core::getTable('WjrInfo')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->wjr_info);
  }
}
