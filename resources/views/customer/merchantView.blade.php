<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/pages.css')}}" />
    @extends('customer.custSidebar')
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
    
</head>
<body>
    @section('content') 

    <button class="btn-back" onclick="window.history.back()">Kembali</button> 
    <div class="box-container" style="display:block;padding-bottom:20px">
        <h2 style="margin: 0px 0px 15px 30px;"> Nama Merchant : {{$merchants->merchant_username}}</h2>
        
        <div style="display:flex;margin-top:-20px">
            <h2 style="margin: 17px 30px 20px 30px;"> Rating : </h2>
            <svg style="width:40px" viewBox="0 0 1111.00 1111.00" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#486de1" stroke="#486de1" stroke-width="0.01111"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#bdcdff" stroke-width="37.774"><path d="M479.817143 780.434286l-158.72 54.857143c-1.462857 0.731429-2.194286 0.731429-2.194286 0.731428 1.462857 0 2.925714 0.731429 4.388572 1.462857 1.462857 1.462857 2.194286 2.194286 2.925714 3.657143v-2.925714l4.388571-160.182857c1.462857-42.422857-17.554286-99.474286-43.885714-133.12l-101.668571-128c-0.731429-1.462857-1.462857-2.194286-1.462858-2.194286 0 1.462857 0 3.657143-0.731428 5.851429-0.731429 2.194286-1.462857 3.657143-2.925714 4.388571 0 0 0.731429 0 2.194285-0.731429l161.645715-46.08c40.96-11.702857 89.234286-46.08 114.102857-81.188571l93.622857-133.12c0.731429-1.462857 1.462857-2.194286 1.462857-2.194286-0.731429 0.731429-2.194286 0.731429-3.657143 0.731429s-2.925714-0.731429-3.657143-0.731429c0 0 0.731429 0.731429 1.462857 2.194286l93.622858 133.12c24.137143 34.377143 73.142857 69.485714 114.102857 81.188571l161.645714 46.08c1.462857 0.731429 2.194286 0.731429 2.194286 0.731429-0.731429-0.731429-2.194286-2.925714-2.925715-4.388571-0.731429-2.194286-0.731429-4.388571-0.731428-5.851429 0 0 0 0.731429-1.462857 2.194286l-101.668572 128c-26.331429 33.645714-45.348571 89.965714-43.885714 133.12l2.194286 80.457143 2.194285 80.457142v2.925715c0.731429-0.731429 1.462857-2.194286 2.925715-3.657143 1.462857-0.731429 2.925714-1.462857 4.388571-1.462857 0 0-0.731429 0-2.194286-0.731429l-158.72-54.857143c-39.497143-14.628571-99.474286-14.628571-138.971428-0.731428z m269.165714 137.508571c59.245714 20.48 113.371429-19.017143 111.908572-81.92l-2.194286-80.457143-2.194286-80.457143c-0.731429-21.942857 11.702857-58.514286 24.868572-76.068571l101.668571-128c39.497143-49.737143 19.017143-114.102857-42.422857-131.657143l-161.645714-46.08c-21.211429-5.851429-53.394286-28.525714-66.56-46.811428l-93.622858-133.12c-35.84-51.2-103.131429-51.2-138.971428 0l-93.622857 133.12c-13.165714 18.285714-44.617143 40.96-66.56 46.811428l-161.645715 46.08c-61.44 17.554286-81.92 81.92-42.422857 131.657143l101.668572 128c13.897143 17.554286 25.6 54.125714 24.868571 76.068571l-4.388571 160.182858c-1.462857 62.902857 51.931429 102.4 111.908571 81.92l158.72-54.857143c21.211429-7.314286 60.708571-7.314286 81.92 0l158.72 55.588571z" fill="#486de1"></path><path d="M548.571429 678.765714c-58.514286 0-125.074286 27.794286-125.074286 27.794286s10.971429-64.365714-6.582857-122.148571-65.828571-111.177143-65.828572-111.177143 76.8-20.48 124.342857-56.32 73.142857-87.771429 73.142858-87.771429 34.377143 51.931429 80.457142 87.771429c46.811429 35.108571 117.028571 56.32 117.028572 56.32s-40.228571 44.617143-58.514286 103.862857-13.897143 129.462857-13.897143 129.462857-66.56-27.794286-125.074285-27.794286z" fill="#486de1"></path><path d="M548.571429 678.765714c-56.32-5.12-125.074286 27.794286-125.074286 27.794286s10.971429-64.365714-6.582857-122.148571-65.828571-111.177143-65.828572-111.177143l198.217143 40.228571c3.657143 145.554286 1.462857 112.64-0.731428 165.302857z" fill="#486de1"></path><path d="M551.497143 678.765714c56.32-5.12 125.074286 27.794286 125.074286 27.794286s-10.971429-64.365714 6.582857-122.148571 65.828571-111.177143 65.828571-111.177143l-198.217143 40.228571c-3.657143 145.554286-1.462857 112.64 0.731429 165.302857z" fill="#486de1"></path></g><g id="SVGRepo_iconCarrier"><path d="M479.817143 780.434286l-158.72 54.857143c-1.462857 0.731429-2.194286 0.731429-2.194286 0.731428 1.462857 0 2.925714 0.731429 4.388572 1.462857 1.462857 1.462857 2.194286 2.194286 2.925714 3.657143v-2.925714l4.388571-160.182857c1.462857-42.422857-17.554286-99.474286-43.885714-133.12l-101.668571-128c-0.731429-1.462857-1.462857-2.194286-1.462858-2.194286 0 1.462857 0 3.657143-0.731428 5.851429-0.731429 2.194286-1.462857 3.657143-2.925714 4.388571 0 0 0.731429 0 2.194285-0.731429l161.645715-46.08c40.96-11.702857 89.234286-46.08 114.102857-81.188571l93.622857-133.12c0.731429-1.462857 1.462857-2.194286 1.462857-2.194286-0.731429 0.731429-2.194286 0.731429-3.657143 0.731429s-2.925714-0.731429-3.657143-0.731429c0 0 0.731429 0.731429 1.462857 2.194286l93.622858 133.12c24.137143 34.377143 73.142857 69.485714 114.102857 81.188571l161.645714 46.08c1.462857 0.731429 2.194286 0.731429 2.194286 0.731429-0.731429-0.731429-2.194286-2.925714-2.925715-4.388571-0.731429-2.194286-0.731429-4.388571-0.731428-5.851429 0 0 0 0.731429-1.462857 2.194286l-101.668572 128c-26.331429 33.645714-45.348571 89.965714-43.885714 133.12l2.194286 80.457143 2.194285 80.457142v2.925715c0.731429-0.731429 1.462857-2.194286 2.925715-3.657143 1.462857-0.731429 2.925714-1.462857 4.388571-1.462857 0 0-0.731429 0-2.194286-0.731429l-158.72-54.857143c-39.497143-14.628571-99.474286-14.628571-138.971428-0.731428z m269.165714 137.508571c59.245714 20.48 113.371429-19.017143 111.908572-81.92l-2.194286-80.457143-2.194286-80.457143c-0.731429-21.942857 11.702857-58.514286 24.868572-76.068571l101.668571-128c39.497143-49.737143 19.017143-114.102857-42.422857-131.657143l-161.645714-46.08c-21.211429-5.851429-53.394286-28.525714-66.56-46.811428l-93.622858-133.12c-35.84-51.2-103.131429-51.2-138.971428 0l-93.622857 133.12c-13.165714 18.285714-44.617143 40.96-66.56 46.811428l-161.645715 46.08c-61.44 17.554286-81.92 81.92-42.422857 131.657143l101.668572 128c13.897143 17.554286 25.6 54.125714 24.868571 76.068571l-4.388571 160.182858c-1.462857 62.902857 51.931429 102.4 111.908571 81.92l158.72-54.857143c21.211429-7.314286 60.708571-7.314286 81.92 0l158.72 55.588571z" fill="#486de1"></path><path d="M548.571429 678.765714c-58.514286 0-125.074286 27.794286-125.074286 27.794286s10.971429-64.365714-6.582857-122.148571-65.828571-111.177143-65.828572-111.177143 76.8-20.48 124.342857-56.32 73.142857-87.771429 73.142858-87.771429 34.377143 51.931429 80.457142 87.771429c46.811429 35.108571 117.028571 56.32 117.028572 56.32s-40.228571 44.617143-58.514286 103.862857-13.897143 129.462857-13.897143 129.462857-66.56-27.794286-125.074285-27.794286z" fill="#486de1"></path><path d="M548.571429 678.765714c-56.32-5.12-125.074286 27.794286-125.074286 27.794286s10.971429-64.365714-6.582857-122.148571-65.828571-111.177143-65.828572-111.177143l198.217143 40.228571c3.657143 145.554286 1.462857 112.64-0.731428 165.302857z" fill="#486de1"></path><path d="M551.497143 678.765714c56.32-5.12 125.074286 27.794286 125.074286 27.794286s-10.971429-64.365714 6.582857-122.148571 65.828571-111.177143 65.828571-111.177143l-198.217143 40.228571c-3.657143 145.554286-1.462857 112.64 0.731429 165.302857z" fill="#486de1"></path></g></svg>
            <h2 style="margin: 17px 30px 15px 30px;">{{$average_rating}}/5</h2>
            <p style="margin: 23px 30px 15px 0px;">({{$review}} ulasan)</p>
        </div>
        
        <div  id='map' style='width: 100%; height: 400px; margin: 20px 0px;'></div>
    </div>      
        

        <div class="merchant-view-content box-container" style="display:flex;text-align: center;justify-content:center">

            @foreach ($items as $serviceItem => $priceItem) 
        
            <div class="card">
                <div class="image">
                    <span class="text">Service Kunci {{$serviceItem}}</span>
                    <div id="formmm">
                        <form method="post" action="/order/{{$merchants->merchant_username}}/{{$serviceItem}}">
                            @csrf
                            <input type="hidden" name="order_type" value="panggil">
                            <input type="hidden" name="order_price" value="{{$priceItem}}">
                            <input id="btn-submit4" type="submit" value="Panggil Kerumah">
                        </form>
                    </div>
                    
                </div>
                
                  <span class="price">Rp. {{$priceItem}},-</span>
                </div>            
        @endforeach
        </div>

        <div style="margin:auto;text-align:center">
            <a id="google-maps-link" href="" >
                <button id="btn-submit5">Cari Rute Tercepat Ke Merchant</button>
            </a>
        </div>
        
<script>
            mapboxgl.accessToken = 'pk.eyJ1Ijoic2F0cmlpYWRhZmZhIiwiYSI6ImNsaDA5Z3lsYzBkOXozbHBxMmtzaTE0djUifQ.GvxtJBL6YN8PIrh5t2pT9g';
            var map = new mapboxgl.Map({
              container: 'map',
              style: 'mapbox://styles/mapbox/streets-v12',
              center: [{{$mercLoc->longitude}},{{$mercLoc->latitude}}],
              zoom: 15
            });
      
      
          map.addControl( new MapboxGeocoder({
              accessToken: mapboxgl.accessToken,
              mapboxgl: mapboxgl
              })
          );
              
          var geolocated = false;

          map.on('load', function() {
                var geolocate = new mapboxgl.GeolocateControl({
                    positionOptions: {
                        enableHighAccuracy: true
                    },
                    trackUserLocation: true,
                    showUserHeading: true
                });

                map.addControl(geolocate);

                geolocate.on('geolocate', function(e) {
                    var longitude = e.coords.longitude;
                    var latitude = e.coords.latitude;
                    var googleMapsLink = `https://www.google.com/maps/dir/${latitude},${longitude}/{{$mercLoc->latitude}},{{$mercLoc->longitude}}`;
                    document.getElementById('google-maps-link').href = googleMapsLink;
                // Ubah variabel geolocated menjadi true
        geolocated = true;
    });
    });

    document.getElementById('btn-submit5').addEventListener('click', function() {
        // Tampilkan alert jika pengguna belum mengklik geolocate
        if (!geolocated) {
            alert('Klik tombol geolocate terlebih dahulu untuk menentukan lokasi Anda');
        } else {
            window.location.href = document.getElementById('google-maps-link').href;
        }
    });


          map.addControl(new mapboxgl.NavigationControl());
          
              
              // Create a default Marker and add it to the map.
          const marker_{{$mercLoc->id}} = new mapboxgl.Marker()
          .setLngLat([ {{$mercLoc->longitude}},{{$mercLoc->latitude}}])
          .addTo(map);
      
</script>
            
     

            
    @endsection
</body>
</html>
