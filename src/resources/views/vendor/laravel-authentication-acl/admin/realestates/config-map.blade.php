@section('footer_scripts_google_map')
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_MuJvadP4H5XiM3kjsxwmot19RBeaupc&libraries=places&callback=initMap"  async defer></script>
    {!! HTML::script('packages/jacopo/laravel-authentication-acl/js/vendor/bootstrap.min.js') !!}

@stop

<input id="pac-input" class="controls" type="text"
        placeholder="Enter a location">
    <div id="type-selector" class="controls">
      <input type="radio" name="type" id="changetype-all" checked="checked">
      <label for="changetype-all">All</label>

      <input type="radio" name="type" id="changetype-establishment">
      <label for="changetype-establishment">Establishments</label>

      <input type="radio" name="type" id="changetype-address">
      <label for="changetype-address">Addresses</label>

      <input type="radio" name="type" id="changetype-geocode">
      <label for="changetype-geocode">Geocodes</label>
    </div>
    <div id="map"></div>
       
       
<style type="text/css">
    input {
        margin: 0.6em 0.6em 0; 
        width:398px;
    }
    #map_canvas {         
        height: 400px;         
        width: 400px;         
        margin: 0.6em;       
    }
</style>