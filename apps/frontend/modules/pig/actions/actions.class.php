<?php

/**
 * pig actions.
 *
 * @package    wjr
 * @subpackage pig
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pigActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  	$q = Doctrine_Core::getTable('WjrPig')
      ->createQuery('a');
	  
    $this->wjr_pigs = $q->execute();
	  
    $this->pager = new sfDoctrinePager(
      'WjrPig',
      sfConfig::get('app_max_pigs')
    );
    $this->pager->setQuery($q);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->wjr_pig = Doctrine_Core::getTable('WjrPig')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->wjr_pig);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new WjrPigForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new WjrPigForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }
/*
  public function executeEdit(sfWebRequest $request)
  {
  	//$this->forward404Unless($this->getUser()->getAttribute('pig_editable'));
	//$this->getUser()->setAttribute('pig_editable', false);
	
    $this->forward404Unless($wjr_pig = Doctrine_Core::getTable('WjrPig')->find(array($request->getParameter('id'))), sprintf('Object wjr_pig does not exist (%s).', $request->getParameter('id')));
    $this->form = new WjrPigForm($wjr_pig);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($wjr_pig = Doctrine_Core::getTable('WjrPig')->find(array($request->getParameter('id'))), sprintf('Object wjr_pig does not exist (%s).', $request->getParameter('id')));
    $this->form = new WjrPigForm($wjr_pig);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($wjr_pig = Doctrine_Core::getTable('WjrPig')->find(array($request->getParameter('id'))), sprintf('Object wjr_pig does not exist (%s).', $request->getParameter('id')));
    $wjr_pig->delete();

    $this->redirect('pig/index');
  }
*/
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $wjr_pig = $form->save();

      //$this->getUser()->setAttribute('pig_editable', true);
	
      $this->getUser()->setFlash('notice', sprintf('Dodano świnię'));
	  
      $this->redirect('pig');
    }
  }
}
