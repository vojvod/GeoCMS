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

    var esri = new ol.layer.Tile({
      title: "OSM",
      baseLayer: true,
              source: new ol.source.XYZ({
                attributions: 'Tiles © <a href="https://services.arcgisonline.com/ArcGIS/' +
                      'rest/services/World_Topo_Map/MapServer">ArcGIS</a>',
                  url: 'https://server.arcgisonline.com/ArcGIS/rest/services/' +
                      'World_Topo_Map/MapServer/tile/{z}/{y}/{x}'
                })
              });

  	// The map
  	var map = new ol.Map
  		({	target: 'map',
  			view: new ol.View
  			({	zoom: 6,
  				center: [173664, 6166327]
  			}),
  			layers: [stamen, osm, esri]
  		});

  	// Add a new Layerswitcher to the map
  	map.addControl (new ol.control.LayerSwitcherImage());

  </script>
@endsection
