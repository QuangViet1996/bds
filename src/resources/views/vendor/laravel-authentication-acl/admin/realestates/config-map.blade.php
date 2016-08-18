<div class='config-map'>

        <input name='map-address' id="pac-input" class="controls" type="text" placeholder="Search Box" value="<?php echo @$data['realestate']->real_estate_map_address ?>">
        <div id="gmap" class="gmap" ></div>

        <input name='map-marker-lat' id='map-marker-lat' type='hidden' value="<?php echo @$data['realestate']->real_estate_map_marker_lat ?>">
        <input name='map-marker-lng' id='map-marker-lng' type='hidden' value="<?php echo @$data['realestate']->real_estate_map_marker_lng?>">
        <input name='map-zoom' id='map-zoom' type='hidden' value="<?php echo @$data['realestate']->real_estate_map_zoom ?>">
        <input name='map-center-lat' id='map-center-lat' type='hidden' value="<?php echo @$data['realestate']->real_estate_map_center_lat ?>">
        <input name='map-center-lng' id='map-center-lng' type='hidden' value="<?php echo @$data['realestate']->real_estate_map_center_lng ?>">



    </div>
    @section('footer_scripts_google_map')
    <script>
        var params = {};
        function initGmap() {
            params = {
                map_marker_lat: <?php echo $realestate->real_estate_map_marker_lat ?>,
                map_marker_lng: <?php echo $realestate->real_estate_map_marker_lng ?>,
                map_center_lat: <?php echo $realestate->real_estate_map_center_lat ?>,
                map_center_lng: <?php echo $realestate->real_estate_map_center_lng ?>,

                map_zoom: <?php echo @$data['realestate']->real_estate_map_zoom ?>,
                inputId: 'pac-input',
                inputs: {
                    marker_lat: 'input-marker-lat',
                    marker_lng: 'input-marker-lng',
                    zoom: 'input-zoom',
                    center_lat: 'input-center-lat',
                    center_lng: 'input-center-lng',
                }
            };
            $('#gmap').initialize(params);
        }

    </script>
    {!! HTML::script('packages/jacopo/laravel-authentication-acl/js/gmap.js') !!}

    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCHkbnENwAyVMfB7tI-yWaNCpDZvOG-2Mc&libraries=places&callback=initGmap"  async defer></script>

    <script>
        $('document').ready(function(){
            $(".menu-config-map").click(function () {
                google.maps.event.trigger(gmap, 'resize');
            });
        });

    </script>
    @stop

