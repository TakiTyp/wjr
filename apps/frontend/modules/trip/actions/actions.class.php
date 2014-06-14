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
	// pobrnie obiektu trasy
	//$this->wjr_track = Doctrine_Core::getTable('WjrTrack')->find(array($this->wjr_trip->getTrackId()));
	
    $this->forward404Unless($this->wjr_trip);
  }
  
  public function executeDownload(sfwebRequest $request)
  {
	$filePath = 'uploads/tracks/'.$request->getParameter('track_name');
	$this->forward404Unless($filePath);
	/** @var $response sfWebResponse */
	$response = $this->getResponse();
	$response->clearHttpHeaders();
	$response->setHttpHeader('Content-Type', 'text/plain');
	$response->setHttpHeader('Content-Disposition', 'attachment; filename="' . basename($filePath) . '"');
	$response->setHttpHeader('Content-Description', 'File Transfer');
	$response->setHttpHeader('Content-Transfer-Encoding', 'binary');
	$response->setHttpHeader('Content-Length', filesize($filePath));
	$response->setHttpHeader('Cache-Control', 'public, must-revalidate');
	// if https then always give a Pragma header like this  to overwrite the "pragma: no-cache" header which
	// will hint IE8 from caching the file during download and leads to a download error!!!
	$response->setHttpHeader('Pragma', 'public');
	//$response->setContent(file_get_contents($filePath)); # will produce a memory limit exhausted error
	$response->sendHttpHeaders();

	ob_end_flush();
	return $this->renderText(readfile($filePath));
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
