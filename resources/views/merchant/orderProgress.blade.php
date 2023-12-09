<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/index.css')}}" />
    <link rel="stylesheet" href="{{asset('css/pages.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    @extends('customer.custSidebar')
    <title>{{$title}}</title>

    <script src='https://unpkg.com/mapbox-gl-js-marker'></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">

    <style>
        /* table,tr,td{
            border:1px solid black;
        } */
        td{
            width: 20%;
        }
    </style>
    
</head>
<body>
    @section('content')


    <button class="btn-back" onclick="window.history.back()">Kembali</button> 
    <div class="box-container">
    <h2>Order Progress</h2>
        
        <div class="image-centered box-container">
            <h2>Data Customer</h2>
            <img style="margin:20px 0px" id="profileImage" src="{{asset('storage/fotoProfilCustomer/'.$image)}}" alt="">
            <h3 style="margin-bottom:40px">{{$order->customer_username}}</h3>
        </div>

        <div class="box-container">
            <div id='map' style='width: 100%; height: 300px;'></div>
            <script>

                let centerlong = ({{$mercLoc->longitude}}+{{$custLoc->longitude}})/2
                let centerlat = ({{$mercLoc->latitude}}+{{$custLoc->latitude}})/2
                

                mapboxgl.accessToken = 'pk.eyJ1Ijoic2F0cmlpYWRhZmZhIiwiYSI6ImNsaDA5Z3lsYzBkOXozbHBxMmtzaTE0djUifQ.GvxtJBL6YN8PIrh5t2pT9g';
                var map = new mapboxgl.Map({
                    container: 'map',
                    style: 'mapbox://styles/mapbox/streets-v12',
                    center: [centerlong,centerlat],
                    zoom: 13
                });

                map.addControl( new MapboxGeocoder({
                accessToken: mapboxgl.accessToken,
                mapboxgl: mapboxgl
                }));
                
                // Create a default Marker and add it to the map.
                const marker_{{$mercLoc->merchant_username}} = new mapboxgl.Marker()
                .setLngLat([ {{$mercLoc->longitude}},{{$mercLoc->latitude}}])
                .addTo(map);

                const marker_{{$custLoc->customer_username}} = new mapboxgl.Marker({color: "#FF0000"})
                .setLngLat([ {{$custLoc->longitude}},{{$custLoc->latitude}}])
                .addTo(map);

            </script>


        <div class="legend" style="padding:20px 0px 0px 20px">
            <svg style="height:40px" fill="#3fb1ce" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve" stroke="#3fb1ce"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M50,10.417c-15.581,0-28.201,12.627-28.201,28.201c0,6.327,2.083,12.168,5.602,16.873L45.49,86.823 c0.105,0.202,0.21,0.403,0.339,0.588l0.04,0.069l0.011-0.006c0.924,1.278,2.411,2.111,4.135,2.111c1.556,0,2.912-0.708,3.845-1.799 l0.047,0.027l0.179-0.31c0.264-0.356,0.498-0.736,0.667-1.155L72.475,55.65c3.592-4.733,5.726-10.632,5.726-17.032 C78.201,23.044,65.581,10.417,50,10.417z M49.721,52.915c-7.677,0-13.895-6.221-13.895-13.895c0-7.673,6.218-13.895,13.895-13.895 s13.895,6.222,13.895,13.895C63.616,46.693,57.398,52.915,49.721,52.915z"></path> </g> </g></svg>
            <label for="">Lokasi Anda</label>
            <svg style="height:40px" fill=" #ff0000" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve" stroke=" #ff0000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M50,10.417c-15.581,0-28.201,12.627-28.201,28.201c0,6.327,2.083,12.168,5.602,16.873L45.49,86.823 c0.105,0.202,0.21,0.403,0.339,0.588l0.04,0.069l0.011-0.006c0.924,1.278,2.411,2.111,4.135,2.111c1.556,0,2.912-0.708,3.845-1.799 l0.047,0.027l0.179-0.31c0.264-0.356,0.498-0.736,0.667-1.155L72.475,55.65c3.592-4.733,5.726-10.632,5.726-17.032 C78.201,23.044,65.581,10.417,50,10.417z M49.721,52.915c-7.677,0-13.895-6.221-13.895-13.895c0-7.673,6.218-13.895,13.895-13.895 s13.895,6.222,13.895,13.895C63.616,46.693,57.398,52.915,49.721,52.915z"></path> </g> </g></svg>
            <label for="">Lokasi Customer</label>
        </div>
        </div>

        <table class="box-container">
            
            <tr>
                <td><h4>Order Id</h4></td>
                <td><h4>:  {{$order->id}}</h4></td>
            </tr>
            <tr>
                <td><h4>Order</h4></td>
                <td><h4>:  Service Kunci {{$order->service_order}}</h4></td>
            </tr>
            <tr>
                <td><h4>Biaya</h4></td>
                <td><h4>:  Rp. {{$order->total_order}}</h4></td>
            </tr>
            <tr>
                <td><h4>Pembayaran</h4></td>
                <td><h4>:  {{$order->payment_by}}</h4></td>
            </tr>
            <tr>
                <td><h4>Status Pembayaran</h4></td>
                <td><h4>:  @if($order->payment_status=='not_paid')
                    Belum Lunas
                    @else
                    Lunas
                    @endif</h4></td>
            </tr>
            <tr>
                <td><h4>Status</h4></td>
                <td><h4>:  {{$order->order_status}}</h4></td>
            </tr> 

        </table>

<div style="text-align: center;">

    <div style="margin:auto;text-align:center">
        <a id="google-maps-link" href="https://www.google.com/maps/dir/{{$mercLoc->latitude}},{{$mercLoc->longitude}}/{{$custLoc->latitude}},{{$custLoc->longitude}}" >
            <button id="btn-progress">Cari Rute Tercepat Ke Customer</button>
        </a>
    </div>
                
    @if($order->order_status=='diterima')
    <form method="get" action="/order/progress/{{$order->id}}">
     @csrf
    <input id="btn-progress"  type="submit" value="Progress">
    </form>
    @elseif($order->order_status=='progress')
    <form method="get" action="/order/selesai/{{$order->id}}">
    @csrf
    <input id="btn-progress" type="submit" value="Selesai">
    @endif
    </form>

                    
</div>

    </div>
    @endsection
</body>
</html>