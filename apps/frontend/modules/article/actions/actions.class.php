<?php

/**
 * article actions.
 *
 * @package    wjr
 * @subpackage article
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class articleActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  	// OLD
    //$this->wjr_articles = Doctrine_Core::getTable('WjrArticle')
    //  ->createQuery('a')
    //  ->execute();
	
  	$q = Doctrine_Core::getTable('WjrArticle')->getArticles();
	  
    $this->pager = new sfDoctrinePager(
      'WjrArticle',
      sfConfig::get('app_max_articles')
    );
    $this->pager->setQuery($q);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
  	// OLD
    //$this->wjr_article = Doctrine_Core::getTable('WjrArticle')->find(array($request->getParameter('id')));
    //$this->forward404Unless($this->wjr_article);
	
	$this->wjr_article = Doctrine_Core::getTable('WjrArticle')->getArticles($request->getParameter('id'));
	$this->forward404Unless($this->wjr_article);
  }
/*
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new WjrArticleForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new WjrArticleForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($wjr_article = Doctrine_Core::getTable('WjrArticle')->find(array($request->getParameter('id'))), sprintf('Object wjr_article does not exist (%s).', $request->getParameter('id')));
    $this->form = new WjrArticleForm($wjr_article);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($wjr_article = Doctrine_Core::getTable('WjrArticle')->find(array($request->getParameter('id'))), sprintf('Object wjr_article does not exist (%s).', $request->getParameter('id')));
    $this->form = new WjrArticleForm($wjr_article);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($wjr_article = Doctrine_Core::getTable('WjrArticle')->find(array($request->getParameter('id'))), sprintf('Object wjr_article does not exist (%s).', $request->getParameter('id')));
    $wjr_article->delete();

    $this->redirect('article/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $wjr_article = $form->save();

      $this->redirect('article/edit?id='.$wjr_article->getId());
    }
  }
 * *
 */
}
