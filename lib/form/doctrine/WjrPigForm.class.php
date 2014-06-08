<?php

/**
 * WjrPig form.
 *
 * @package    wjr
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class WjrPigForm extends BaseWjrPigForm
{
  public function configure()
  {
	$this->useFields(array('nick', 'email', 'public_me', 'picture', 'latitude', 'longitude', 'description'));
	
	$this->widgetSchema['picture'] = new sfWidgetFormInputFile(array(
	));
	
	$this->widgetSchema->setLabels(array(
	  'nick'    => 'Imię',
	  'public_me'      => 'Pokazać email?',
	  'picture'   => 'Zdjęcie',
	  'latitude'   => 'Szerokość',
	  'longitude'   => 'Wysokość',
	  'description'   => 'Komentarz',
	));
	
	$this->validatorSchema['email'] = new sfValidatorAnd(array(
	  $this->validatorSchema['email'],
	  new sfValidatorEmail(),
	));
	
	$this->validatorSchema['picture'] = new sfValidatorFile(array(
	  'required'   => false,
	  'path'       => sfConfig::get('sf_upload_dir').'/pigs',
	  'mime_types' => 'web_images',
	));
	
	//$this->widgetSchema->setHelp('public_me', 'Pokaż mój email');
  }
}
