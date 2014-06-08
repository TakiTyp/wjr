<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
  	$this->setWebDir($this->getRootDir().'/web');
	
    $this->enablePlugins(array(
      'sfDoctrinePlugin',
	  'sfDoctrineGuardPlugin',
	  'sfFormExtraPlugin'));
	
	sfValidatorBase::setDefaultMessage('required', 'To pole jest wymagane.');
	sfValidatorBase::setDefaultMessage('invalid', 'Nie poprawne dane.');
  }
}
