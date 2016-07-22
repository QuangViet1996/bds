jQuery.fn.extend({
    /*
     * initialize map
     */
    gmap: null,
    
    map_marker_lat: null,
    map_marker_lng: null,
    
    map_center_lat: null,
    map_center_lng: null,
    
    map_zoom: null,
    
    marker: null,
    markes: null,
    
    current_center_lat: null,
    current_center_lng: null,
    current_zoom: null,
    current_marker_lat: null,
    current_marker_lng: null,
    
    /**
     * 
     * @param {type} params
     * @returns {undefined}
     */
    set: function (params) {
        this.map_marker_lat = params.map_marker_lat;
        this.map_marker_lng = params.map_marker_lng;
        
        this.map_center_lat = params.map_center_lat;
        this.map_center_lng = params.map_center_lng;
        
        
        this.map_zoom = params.map_zoom;
    },
    
    /**
     * 
     */
    reset: function () {
        this.map_marker_lat = null;
        this.map_marker_lng = null;
        
        this.map_center_lat = null;
        this.map_center_lng = null;
        
        
        this.map_zoom = null;

        //clear marker
        this.marker.setMap(null);
        this.marker = null;

        //clear markers
        this.markers.forEach(function (marker) {
            marker.setMap(null);
        });
        this.markes = null;
    },
    
    /**
     * 
     */
    updateMarkerCurrentPosition: function(position) {
        this.current_marker_lat = position.lat();
        this.current_marker_lng = position.lng();
        $('#map-marker-lat').val(this.current_marker_lat);
        $('#map-marker-lng').val(this.current_marker_lng);
        
    },
    
    /**
     * 
     */
    updateCenterCurrentPosition: function(position) {
        this.current_center_lat = position.lat();
        this.current_center_lng = position.lng();
        $('#map-center-lat').val(this.current_center_lat);
        $('#map-center-lng').val(this.current_center_lng);
        
    },
    
    /**
     * 
     */
    updateCurrentZoom: function(zoomLevel) {
        this.current_zoom = zoomLevel;
        $('#map-zoom').val(this.current_zoom);
        
    },
    
   
    /***************************************************************************
     * 
     */
    initialize: function (params) {
        
        this.set(params);
        var canvas_map = this[0];
        this.gmap = new google.maps.Map(canvas_map, {
            center: {
                lat: this.map_center_lat,
                lng: this.map_center_lng
            },
            zoom: this.map_zoom,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var _parent = this;
         $(".menu-config-map").click(function () {
             
             _parent.gmap.setCenter(new google.maps.LatLng(_parent.map_center_lat, _parent.map_center_lng));
             
            
         });
        // Create a marker for each place.
        this.marker = new google.maps.Marker({
            map: this.gmap,
            position: {
                lat: this.map_marker_lat, 
                lng: this.map_marker_lng
            },
            draggable: true,
        });
        // Create the search box and link it to the UI element.
        var input = document.getElementById(params.inputId);
        var searchBox = new google.maps.places.SearchBox(input);
        this.gmap.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        this.gmap.addListener('bounds_changed', function () {
            searchBox.setBounds(this.getBounds());
        });
        
        this.eventSearchplace(searchBox);
        this.eventZoomChange();
        this.eventCenterChange();
        this.eventMarkerDragend();
        

    },
    
    /**
     * 
     */
    eventMarkerClick: function () {
    },
    
    /**
     * 
     */
    eventMarkerDragend: function () {
        var _parent = this;
        if (_parent.marker == null) {
            return false;
        }
        google.maps.event.addListener(_parent.marker, 'dragend', function (event) {
            _parent.map_marker_lat = this.getPosition().lat();
            _parent.map_marker_lng = this.getPosition().lng();
            _parent.updateMarkerCurrentPosition(this.getPosition());
        });

    },
    
    /**
     * 
     */
    eventSearchplace: function (searchBox) {
        var _parent = this;
        searchBox.addListener('places_changed', function () {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }
            

            // Clear out the old markers.
            if (_parent.marker != null) {
                _parent.marker.setMap(null);
            }
            _parent.marker = null;

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function (place) {
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };

                // Create a marker for each place.
                _parent.marker = new google.maps.Marker({
                    map: _parent.gmap,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location,
                    draggable: true,
                });
                
                _parent.updateMarkerCurrentPosition(place.geometry.location);

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
                
                _parent.eventMarkerDragend();

                return false;

            });
            _parent.gmap.fitBounds(bounds);
        });
    },
    
    /**
     * 
     */
    eventZoomChange: function(){
        var _parent = this;
        google.maps.event.addListener(_parent.gmap, 'zoom_changed', function() {
            _parent.updateCurrentZoom(_parent.gmap.getZoom());
        });
    },
    
    /**
     * Ref https://developers.google.com/maps/documentation/javascript/events
     */
    eventCenterChange: function() {
        
        var _parent = this;
        google.maps.event.addListener(_parent.gmap, 'center_changed', function() {
            
            _parent.updateCenterCurrentPosition(_parent.gmap.getCenter());
            
        });
        
    }
});
