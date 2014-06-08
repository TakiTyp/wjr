<?php slot('title', sprintf('wartajuraroweru.pl - Chlew')) ?>

<?php use_stylesheet('pigs.css') ?>
<?php use_stylesheet('details.css') ?>

<?php use_stylesheet('lightbox/lightbox.css') ?>
<?php use_javascript('lightbox/jquery-1.7.2.min.js') ?>
<?php use_javascript('lightbox/lightbox.js') ?>

	<!-- bring in the OpenLayers javascript library
		 (here we bring it from the remote site, but you could
		 easily serve up this javascript yourself) -->
	<script type="text/javascript" src="http://www.openlayers.org/api/OpenLayers.js"></script>
	<!-- bring in the OpenStreetMap OpenLayers layers.
		 Using this hosted file will make sure we are kept up
		 to date with any necessary changes -->
	<script type="text/javascript" src="http://www.openstreetmap.org/openlayers/OpenStreetMap.js"></script>
 
	<script type="text/javascript">
		// Start position for the map (hardcoded here for simplicity,
		// but maybe you want to get this from the URL params)
		//var lat=51.1162
		//var lon=18.8631
		var zoom=13
 
		var map; //complex object of type OpenLayers.Map
 
		function init(lat, lon) {
			map = new OpenLayers.Map ("map", {
				controls:[
					new OpenLayers.Control.Navigation(),
					new OpenLayers.Control.PanZoomBar(),
					new OpenLayers.Control.LayerSwitcher(),
					new OpenLayers.Control.Attribution()],
				maxExtent: new OpenLayers.Bounds(-20037508.34,-20037508.34,20037508.34,20037508.34),
				maxResolution: 156543.0399,
				numZoomLevels: 19,
				units: 'm',
				projection: new OpenLayers.Projection("EPSG:900913"),
				displayProjection: new OpenLayers.Projection("EPSG:4326")
			} );
 
			// Define the map layer
			// Here we use a predefined layer that will be kept up to date with URL changes
			layerMapnik = new OpenLayers.Layer.OSM.Mapnik("Mapnik");
			map.addLayer(layerMapnik);
			layerCycleMap = new OpenLayers.Layer.OSM.CycleMap("CycleMap");
			map.addLayer(layerCycleMap);
			layerMarkers = new OpenLayers.Layer.Markers("Świnia");
			map.addLayer(layerMarkers);
 
			var lonLat = new OpenLayers.LonLat(lon, lat).transform(new OpenLayers.Projection("EPSG:4326"), map.getProjectionObject());
			map.setCenter(lonLat, zoom);
 
			var size = new OpenLayers.Size(16, 16);
			var icon = new OpenLayers.Icon('http://wartajuraroweru.pl/images/_pig_marker.png',size,0);
			layerMarkers.addMarker(new OpenLayers.Marker(lonLat,icon));
		}
	</script>
	
  <div>
    <h3><?php echo $wjr_pig->getNick() ?>&nbsp;
        <?php if($wjr_pig->getPublicMe()): ?>
	      <?php echo $wjr_pig->getEmail() ?>
	    <?php endif; ?>
	</h3>
    <?php if($wjr_pig->getPicture()): ?>
      <a href="/uploads/pigs/<?php echo $wjr_pig->getPicture() ?>" rel="lightbox">
        <img class="pig_center_img" src="/uploads/pigs/<?php echo $wjr_pig->getPicture() ?>" />
      </a>
    <?php endif; ?>
    <p>Współrzędne:&nbsp;<?php echo $wjr_pig->getLatitude() ?>&nbsp;<?php echo $wjr_pig->getLongitude() ?></p>
    <p>Opis:&nbsp;<?php echo $wjr_pig->getRaw('description') ?></p>
    <div class="clear"></div>
	<div id="PIGS_MAP">
	    <div id="map">
			<script type="text/javascript">
			init(<?php echo $wjr_pig->getLatitude() ?>, <?php echo $wjr_pig->getLongitude() ?>);
			</script>
	    </div>
	</div>
    <p class="small">Dodano:&nbsp;<?php echo $wjr_pig->getDateTimeObject('created_at')->format('d/m/Y') ?></p>
  </div>
<a href="<?php echo url_for('pig/index') ?>"><div class="back">Powrót</div></a>
