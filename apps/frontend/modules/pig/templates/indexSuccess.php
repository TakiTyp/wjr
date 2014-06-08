<?php use_stylesheet('pigs.css') ?>
<?php use_stylesheet('pigs_list.css') ?>

<?php slot('title', sprintf('wartajuraroweru.pl - Chlew')) ?>

<h2>Chlew</h2>
<a href="<?php echo url_for('pig/new') ?>"><div class="add_pig">Dodaj świnię</div></a>
<hr/>
<h3>Nasze Świnie</h3>

	<!-- bring in the OpenLayers javascript library
		 (here we bring it from the remote site, but you could
		 easily serve up this javascript yourself) -->
	<script type="text/javascript" src="http://www.openlayers.org/api/OpenLayers.js"></script>
	<!-- bring in the OpenStreetMap OpenLayers layers.
		 Using this hosted file will make sure we are kept up
		 to date with any necessary changes -->
	<script type="text/javascript" src="http://www.openstreetmap.org/openlayers/OpenStreetMap.js"></script>
 
	<script type="text/javascript">
		var map; //complex object of type OpenLayers.Map
 
		function init() {
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
			layerMarkers = new OpenLayers.Layer.Markers("Świnie");
			map.addLayer(layerMarkers);
			
			var size = new OpenLayers.Size(16, 16);
			var icon = new OpenLayers.Icon('http://wartajuraroweru.pl/images/_pig_marker.png',size,0);

		<?php foreach ($wjr_pigs as $wjr_pig): ?>
			var lat = <?php echo $wjr_pig->getLatitude() ?>
			//musi byc endl!!!
			var lon = <?php echo $wjr_pig->getLongitude() ?>
			//musi byc endl!!!
			var lonLat = new OpenLayers.LonLat(lon, lat).transform(new OpenLayers.Projection("EPSG:4326"), map.getProjectionObject());
			layerMarkers.addMarker(new OpenLayers.Marker(lonLat, icon.clone()));
		<?php endforeach; ?>

			var dataExtent = layerMarkers.getDataExtent();
			map.zoomToExtent(dataExtent);
			map.zoomOut();
		}
	</script>

<div id="PIGS_MAP">
    <div id="map">
		<script type="text/javascript">
		init();
		</script>
    </div>
</div>
<hr/>
<?php include_partial('global/pages', array('pager' => $pager, 'module' => 'pig', 'desc' => 'świń w chlewie')) ?>
<hr/>
<?php include_partial('pig/list', array('wjr_pigs' => $pager->getResults())) ?>
