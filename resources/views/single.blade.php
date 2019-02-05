@extends('layouts.frontend')

@section('styles')
  <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
  <link rel="stylesheet" href="http://viglino.github.io/ol-ext/dist/ol-ext.css" type="text/css">
@endsection

@section('scripts')
  <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>
  <script src="http://viglino.github.io/ol-ext/dist/ol-ext.js"></script>
@endsection

@section('content')
  <div id="map" class="map" style="width: 100%; height: 100%; position:fixed"></div>
  <script type="text/javascript">

    // Two base layers
    var stamen = new ol.layer.Tile(
          {	title: "Watercolor",
            baseLayer: true,
            source: new ol.source.Stamen({
              layer: 'watercolor'
            })
          });
    var osm = new ol.layer.Tile(
          {	title: "OSM",
            baseLayer: true,
            source: new ol.source.OSM(),
            visible: false
          });

    // GeoJSON layer with a preview attribute
    var vectorSource = new ol.source.Vector(
    {	url: '../data/fond_guerre.geojson',
      projection: 'EPSG:3857',
      format: new ol.format.GeoJSON(),
      attributions: [ "&copy; <a href='https://data.culture.gouv.fr/explore/dataset/fonds-de-la-guerre-14-18-extrait-de-la-base-memoire'>data.culture.gouv.fr</a>" ],
      logo:"https://www.data.gouv.fr/s/avatars/37/e56718abd4465985ddde68b33be1ef.jpg"
    });

    var vector = new ol.layer.Vector(
    {	name: '1914-18',
      preview: "http://www.culture.gouv.fr/Wave/image/memoire/2445/sap40_z0004141_v.jpg",
      source: vectorSource
    });

  	// The map
  	var map = new ol.Map
  		({	target: 'map',
  			view: new ol.View
  			({	zoom: 6,
  				center: [173664, 6166327]
  			}),
  			layers: [stamen, osm, vector]
  		});

  	// Add a new Layerswitcher to the map
  	map.addControl (new ol.control.LayerSwitcherImage());

  </script>
@endsection
