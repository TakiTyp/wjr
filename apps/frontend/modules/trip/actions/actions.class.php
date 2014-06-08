<?php

/**
 * trip actions.
 *
 * @package    wjr
 * @subpackage trip
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tripActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    //$this->wjr_trips = Doctrine_Core::getTable('WjrTrip')
    //  ->createQuery('a')
    //  ->execute();
	  
  	$q = Doctrine_Core::getTable('WjrTrip')->getTrips();
	  
    $this->pager = new sfDoctrinePager(
      'WjrTrip',
      sfConfig::get('app_max_trips')
    );
    $this->pager->setQuery($q);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
    //$this->wjr_trip = Doctrine_Core::getTable('WjrTrip')->find(array($request->getParameter('id')));
    //$this->forward404Unless($this->wjr_trip);
	
	$this->wjr_trip = Doctrine_Core::getTable('WjrTrip')->getTrips($request->getParameter('id'));
    $this->forward404Unless($this->wjr_trip);
  }
/*
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new WjrTripForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new WjrTripForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($wjr_trip = Doctrine_Core::getTable('WjrTrip')->find(array($request->getParameter('id'))), sprintf('Object wjr_trip does not exist (%s).', $request->getParameter('id')));
    $this->form = new WjrTripForm($wjr_trip);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($wjr_trip = Doctrine_Core::getTable('WjrTrip')->find(array($request->getParameter('id'))), sprintf('Object wjr_trip does not exist (%s).', $request->getParameter('id')));
    $this->form = new WjrTripForm($wjr_trip);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($wjr_trip = Doctrine_Core::getTable('WjrTrip')->find(array($request->getParameter('id'))), sprintf('Object wjr_trip does not exist (%s).', $request->getParameter('id')));
    $wjr_trip->delete();

    $this->redirect('trip/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $wjr_trip = $form->save();

      $this->redirect('trip/edit?id='.$wjr_trip->getId());
    }
  }
 * 
 */
}
