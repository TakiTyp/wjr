<?php

class BackendWjrPigForm extends WjrPigForm
{
  public function configure()
  {
    parent::configure();
 
 	$this->widgetSchema['description'] = new sfWidgetFormTextareaTinyMCE();
	
    $this->widgetSchema['picture'] = new sfWidgetFormInputFileEditable(array(
      'label'     => 'Zdjęcie',
      'file_src'  => '/uploads/pigs/'.$this->getObject()->getPicture(),
      'is_image'  => true,
      'edit_mode' => !$this->isNew(),
      'template'  => '<div><div class="edit_img">%file%</div><br />%input%<br /><br />Usuń zdjęcie %delete%</div>',
    ));
 
    $this->validatorSchema['picture_delete'] = new sfValidatorPass();
  }
}