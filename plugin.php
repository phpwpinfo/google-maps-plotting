<?php
/*
Plugin Name: Google Maps Plotting
Description: Plot events, photos ,places etc on google map by providing your own set of Markers in XML format
Version: 1.0
Tested up to: WPMU 4.4.1
License: GNU General Public License 2.0 (GPL) http://www.gnu.org/licenses/gpl.html
Author: Rohan Mehta
Author URI: 
Plugin URI:
tags:Plot events plot photos, plot places, markers, Google Maps, google map, multiple locations, Forward Geocoding, Reverse Geocoding, Geocoding
*/


global $wpdb;
include(plugin_dir_path( __FILE__ )."/google-map-plotter.php");
include(plugin_dir_path( __FILE__ )."/gmap-plotter-settings.php"); 
$google_map_plotter=new GoogleMapPlotter();
?>
