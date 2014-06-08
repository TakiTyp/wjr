<?php

class BackendWjrTrackForm extends WjrTrackForm
{
  // process values before saving in database
  public function processValues($values)
  {
    $fileName = "uploads/tracks/";
	
	// get uploaded file name (column name is 'name')
    if ($values['name'] instanceof sfValidatedFile)
    {
       $file = $values['name'];
	   $fileName .= $file->getOriginalName();
    }
	
	// get data from uploaded GPX file
	if($xml = simplexml_load_file($fileName)) {
		$points = count($xml->trk[0]->trkseg[0]->trkpt);
		$startCords = $xml->trk[0]->trkseg[0]->trkpt[0]->attributes();
		$stopCords = $xml->trk[0]->trkseg[0]->trkpt[$points-1]->attributes();
		
		$this->getObject()->setLatStart($startCords['lat']);
		$this->getObject()->setLonStart($startCords['lon']);
		$this->getObject()->setLatStop($stopCords['lat']);
		$this->getObject()->setLonStop($stopCords['lon']);
		$this->getObject()->setPoints($points);
	}
	
    return parent::processValues($values);
  }
  
  // saves original file name
  public function generateNameFilename(sfValidatedFile $file){
    return $file->getOriginalName();
  }
  
  public function configure()
  {
    parent::configure();
	
	$this->widgetSchema['description'] = new sfWidgetFormTextareaTinyMCE();

    $this->widgetSchema['name'] = new sfWidgetFormInputFileEditable(array(
      'label'     => 'Trasa GPX',
      'file_src'  => '/uploads/tracks/'.$this->getObject()->getName(),
      'edit_mode' => !$this->isNew(),
    ));
	
	$this->validatorSchema['name'] = new sfValidatorFile(array(
	  'required'   => false,
	  'path'       => sfConfig::get('sf_upload_dir').'/tracks',
	));
 
    $this->validatorSchema['name_delete'] = new sfValidatorPass();
  }
}