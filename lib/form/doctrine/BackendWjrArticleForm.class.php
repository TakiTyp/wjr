<?php

class BackendWjrArticleForm extends WjrArticleForm
{
  public function configure()
  {
    parent::configure();
 
    $this->widgetSchema['description'] = new sfWidgetFormTextareaTinyMCE();

    $this->widgetSchema['logo'] = new sfWidgetFormInputFileEditable(array(
      'label'     => 'Zdjęcie',
      'file_src'  => '/uploads/articles/'.$this->getObject()->getLogo(),
      'is_image'  => true,
      'edit_mode' => !$this->isNew(),
      'template'  => '<div><div class="edit_img">%file%</div><br />%input%<br /><br />Usuń zdjęcie %delete%</div>',
    ));
	
	$this->validatorSchema['logo'] = new sfValidatorFile(array(
	  'required'   => false,
	  'path'       => sfConfig::get('sf_upload_dir').'/articles',
	  'mime_types' => 'web_images',
	));
 
    $this->validatorSchema['logo_delete'] = new sfValidatorPass();
  }
}