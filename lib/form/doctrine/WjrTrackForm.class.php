<?php

/**
 * WjrTrack form.
 *
 * @package    wjr
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class WjrTrackForm extends BaseWjrTrackForm
{
  public function configure()
  {
  	unset(
  	  $this['lon_start'], $this['lat_start'], $this['lon_stop'], $this['lat_stop'], $this['points'], $this['created_at'], $this['updated_at']
	);
  }
}
