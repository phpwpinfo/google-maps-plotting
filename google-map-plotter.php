<?php

class GoogleMapPlotter {

    private $api_key;

    public function __construct() {
        add_shortcode('PW_PLOT_GOOGLE_MAP', array($this, 'generate_google_map_plotting'));

        $options = get_option('gmap_plot_option_name');
        $this->api_key = $options['api_key'];
    }

    function generate_google_map_plotting($atts) {
        $gmap_atts = shortcode_atts(array(
            'xml_file_path' => '',
            'zoom' => '',
            'html' => ''
                ), $atts);
        if ($atts['zoom'] == NULL)
            $atts['zoom'] = 2;
        ?>
        <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $this->api_key; ?>"
        type="text/javascript"></script>
        <script src="<?php echo plugin_dir_url( __FILE__ ) ?>js/markerclusterer.js" type="text/javascript"></script>       
        <script type="text/javascript">
        //<![CDATA[


            function load() {
                var map = new google.maps.Map(document.getElementById("map"), {
                    center: new google.maps.LatLng(51.086, 13.74956),
                    zoom: <?php echo $atts['zoom']; ?>,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
                var infoWindow = new google.maps.InfoWindow;

                var gmarkers = [];

                // Change this depending on the name of your PHP file
                downloadUrl("<?php echo $atts['xml_file_path']; ?>", function(data) {
                    var xml = data.responseXML;
                    var markers = xml.documentElement.getElementsByTagName("marker");
                    map.setCenter({lat: parseFloat(markers[0].getAttribute("lat")), lng: parseFloat(markers[0].getAttribute("lng"))});

                    if (markers.length > 0) {
                        for (var i = 0; i < markers.length; i++) {
                            var point = new google.maps.LatLng(
                                    parseFloat(markers[i].getAttribute("lat")),
                                    parseFloat(markers[i].getAttribute("lng")));

        <?php
        if ($atts['html'] != NULL) {
            $html_arr = explode('|', $atts['html']);
            foreach ($html_arr as $html_ar) {
                $html = explode(",", $html_ar);
                echo 'var ' . $html[0] . ' = markers[i].getAttribute("' . $html[0] . '");';
                if ($html[1] != NULL)
                    $html1_label = "<span id=\"gplotter_attr_" . $html[0] . "\">" . $html[1] . " : </span>";

                $html1 = $html1 . $html1_label . "<span id=\"gplotter_data_" . $html[0] . "\">'+" . $html[0] . "+'</span><br />";
        }
        }
        ?>

                            var html = '<?php echo $html1; ?>';
                            var marker = new google.maps.Marker({
                                map: map,
                                position: point
                            });

                            bindInfoWindow(marker, map, infoWindow, html);
                            gmarkers.push(marker);

                        }
                        var markerCluster = new MarkerClusterer(map, gmarkers);
                    }
                });


            }

            function bindInfoWindow(marker, map, infoWindow, html) {
                google.maps.event.addListener(marker, 'click', function() {
                    infoWindow.setContent(html);
                    infoWindow.open(map, marker);
                });
            }

            function downloadUrl(url, callback) {
                var request = window.ActiveXObject ?
                        new ActiveXObject('Microsoft.XMLHTTP') :
                        new XMLHttpRequest;

                request.onreadystatechange = function() {
                    if (request.readyState == 4) {
                        request.onreadystatechange = doNothing;
                        callback(request, request.status);
                    }
                };

                request.open('GET', url, true);
                request.send(null);
            }

            function doNothing() {
            }

        //]]>
            google.maps.event.addDomListener(window, 'load', load);

        </script>
        <div id="map" class="map"></div>
        <?php
    }

}
?>
