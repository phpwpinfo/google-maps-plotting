=== Google Maps Plotting ===
Tags: Plot events plot photos, plot places, markers, Google Maps, google map, multiple locations, Forward Geocoding, Reverse Geocoding, Geocoding
Requires at least: 3.8
Tested up to: 4.4.1
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html
Contributors: rohanmehta19

Plot multiple addresses on a Google Map, with a simple short code.
== Description ==

Features:
* Plot Multiple Locations on a Map
* Marker Clustering
* Ability to click each marker to get more details i.e. through a Marker popup
* Marker's info popup details is customizable through shortcode and CSS
* Easy to use as works with simple shortcodes
* Ability to set initial zoom level through shortcode

Note: Before using this plugin you need to get Google Maps API key through the google developer console.
Once you enter the API key on the settings screen of the plugin it simple works with shortcodes and your XML markers

To display google map, you need markers in XML format and a simple configurable shortcode
Below is a sample XML

<markers>
<marker name="Some Place" topic="Some Topic" address="1st Street, City, Country" lat="6.8722333" lng="79.8632416" date="14-Feb-16" contact="" presenter="Mary" type="event"/>
</markers>

Sample Shortcode

[PW_PLOT_GOOGLE_MAP 
xml_file_path="/xml/sample_markers.xml"  
zoom=2 
html="topic,Topic|presenter,Presenter|date,Date|contact,Telephone / Mobile" 
]



== Installation ==

1. Upload the plugin files Google Maps Plotting in the same way you'd install any other plugin.
2. Activate the plugin

== Screenshots ==



== Documentation ==

Here is a sample shortcode
[PW_PLOT_GOOGLE_MAP 
xml_file_path="/xml/sample_markers.xml"  
zoom=2 
html="topic,Topic|presenter,Presenter|date,Date|contact,Telephone / Mobile" 
]

xml_file_path => path the xml file which generates markers in following format

<markers>
<marker name="Some Place" topic="Some Topic" address="1st Street, City, Country" lat="6.8722333" lng="79.8632416" date="14-Feb-16" contact="" presenter="Mary" type="event"/>
</markers>

zoom: Initial zoom level. Default is 2

html: It creates the html to be shown in the Marker popup when a certain marker is clicked.
It needs data in below format

data_attribute_1,label_1|data_attribute_2,label_2, etc

data_attributes are case sensitive and should match to the XML file attributes
For the above sample XML, the attributes are as follows
name, address, date, contact, type


== Frequently Asked Questions ==



== Changelog ==



== Upgrade Notice ==


