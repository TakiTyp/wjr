<?php slot('title', sprintf('wartajuraroweru.pl - %s', $wjr_trip->getTitle())) ?>

<?php use_stylesheet('trip.css') ?>
<?php use_stylesheet('articles.css') ?>
<?php use_stylesheet('details.css') ?>

<?php use_stylesheet('colorbox/colorbox.css') ?>
<?php use_javascript('https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js') ?>
<?php use_javascript('colorbox/jquery.colorbox-min.js') ?>

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
			layerMarkers = new OpenLayers.Layer.Markers("Świnia");
			map.addLayer(layerMarkers);
			
			var size = new OpenLayers.Size(16, 16);
			var iconStart = new OpenLayers.Icon('/images/_start.png',size,0);
			var iconStop = new OpenLayers.Icon('/images/_stop.png',size,0);
			
			var name = "/uploads/tracks/";
			name = name + "<?php echo $wjr_trip['gpx_name'] ?>";
			
			// Get start and end points using DOM
			xhttp=new XMLHttpRequest();
			xhttp.open("GET",name,false);
			xhttp.setRequestHeader("Content-Type","text/xml");
			xhttp.send();
			xmlDoc=xhttp.responseText;
			
			// need to parse from plain text to xml
			var parser = new DOMParser();
			xmlDocX = parser.parseFromString(xmlDoc,"text/xml");
			
			x=xmlDocX.documentElement.getElementsByTagName("trkpt");
			latStart=x[0].getAttribute("lat");
			lonStart=x[0].getAttribute("lon");
			latStop=x[x.length-1].getAttribute("lat");
			lonStop=x[x.length-1].getAttribute("lon");
			var lonlatStart = new OpenLayers.LonLat(lonStart, latStart).transform(new OpenLayers.Projection("EPSG:4326"), map.getProjectionObject());
			var lonlatStop = new OpenLayers.LonLat(lonStop, latStop).transform(new OpenLayers.Projection("EPSG:4326"), map.getProjectionObject());
			
			// Center map over track
			var dataExtent;
			var setExtent = function()
			{
				if(dataExtent)
					dataExtent.extend(this.getDataExtent());
				else
					dataExtent = this.getDataExtent();
				map.zoomToExtent(dataExtent);
			};
			
			var lgpx = new OpenLayers.Layer.Vector("GPX Data", {
				protocol: new OpenLayers.Protocol.HTTP({
					url: name,
					format: new OpenLayers.Format.GPX({extractWaypoints: true, extractRoutes: true, extractAttributes: true})
				}),
				strategies: [new OpenLayers.Strategy.Fixed()],
				style: {fillColor: "darkred", strokeColor: "blue", strokeWidth: 4, strokeOpacity: 0.6, pointRadius: 5},
				projection: new OpenLayers.Projection("EPSG:4326")
			});
			lgpx.events.register("loadend", lgpx, setExtent);
			map.addLayer(lgpx);
			
			layerMarkers.addMarker(new OpenLayers.Marker(lonlatStop,iconStop));
			layerMarkers.addMarker(new OpenLayers.Marker(lonlatStart,iconStart));
		}
		
		function setTripInfo() {
			var info = "Informacje o trasie:";
			var points = "<p>Punktów: " + "<?php echo $wjr_trip['gpx_points'] ?>" + "</p>";
			var startCoord = "<p>Wsp. początkowe:<br />" + "<?php echo $wjr_trip['gpx_lat_start'] ?>" +
							 ", " + "<?php echo $wjr_trip['gpx_lon_start'] ?>" + "</p>"
			
			info = info + points + startCoord;
			document.getElementById("trip_info").innerHTML = info;
		}
	</script>
	
	<script>
		jQuery(document).ready(function(){
			// logo do powiekszenia
			jQuery("a.logo").colorbox({ opacity:0.5 , maxWidth:1000, maxHeight:1000 });
			// zmiana nazw id kontenerow;
			// rezultat init() wyswietla sie w kontenerze div o id="map",
			// aby nie wyswietlic mapy drugi raz w malej mapie, nalezy zmienic id,
			// a przy zamknieciu duzej mapy spowrotem;
			// w rezultacie mala mapa znika, az do zamkniecia duzej, gdy spowrotem id="map"
			jQuery(".map_large").colorbox({
				onOpen:function(){ document.getElementById("map").id = "map_small"; },
				onComplete:function(){ document.getElementById("map_large").id = "map"; init(); setTripInfo(); },
				onCleanup:function(){ document.getElementById("map").id = "map_large"; document.getElementById("map_small").id = "map"; },
				width:"90%",
				height:"90%"
			});
		});
	</script>
		
  <div>
  	<div class="trip_desc">
      <h3><?php echo $wjr_trip->getTitle() ?></h3>
      <?php if($wjr_trip->getLogo()): ?>
		<a class="logo" href="/uploads/trips/<?php echo $wjr_trip->getLogo() ?>">
			<img class="details_mini_img" src="/uploads/trips/<?php echo $wjr_trip->getLogo() ?>" />
		</a>
      <?php endif; ?>
      <p><?php echo $wjr_trip->getRaw('description') ?></p>
    </div>
    <?php if($wjr_trip->getHasTrack()): ?>
      <div id="GPX_MAP">
        <div id="map">
		  <script type="text/javascript">
		    init();
		  </script>
        </div>
		<div id="map_tools">
		  <a href="<?php echo url_for('trip/download?track_name='.$wjr_trip['gpx_name']) ?>">
		    <div id="download_btn" class="map_tool_btn">
			  <p>Pobierz</p>
		    </div>
		  </a>
		  <a class="map_large" href="/_map_large.php?track_name=<?php echo url_for('trip/download?track_name='.$wjr_trip['gpx_name']) ?>" title="<?php echo $wjr_trip['gpx_title'] ?>">
		    <div id="fullscreen_btn" class="map_tool_btn">
			  <p>Powiększ</p>
		    </div>
		  </a>
		</div>
      </div>
	<?php endif; ?>
    <div class="clear"></div>
    <p class="small">Opublikowano:&nbsp;<?php echo $wjr_trip->getDateTimeObject('created_at')->format('d/m/Y') ?></p>
  </div>
<a href="<?php echo url_for('trip/index') ?>"><div class="back">Powrót</div></a>
