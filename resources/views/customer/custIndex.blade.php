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

    <link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
    
</head>
<body>

    <a href="https://www.google.com/maps/dir/[lat1],[lon1]/[lat2],[lon2]/"></a>
    @section('content')


    @if($review)
        <div id="message-box" class="alert alert-dismissible fade show" role="alert">
            <h3>Beri Review Merchant Terakhir</h3>
            <img src="images/profileIcon.png" style="width:30%;margin-top:55px"loading="lazy" alt="">
            <div style="margin:15px;font-size:25px">
                <strong>{{$review->merchant_username}}</strong>
            </div>
            <form action="/send-review/{{$review->id}}" method="post">
                @csrf
                <div class="rating">
                    <label for="star-1">
                      <input type="radio" id="star-1" name="star_radio" value="5">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>
                    </label>
                    <label for="star-2">
                      <input type="radio" id="star-2" name="star_radio" value="4">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>
                    </label>
                    <label for="star-3">
                      <input type="radio" id="star-3" name="star_radio" value="3">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>
                    </label>
                    <label for="star-4">
                      <input type="radio" id="star-4" name="star_radio" value="2">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>
                    </label>
                    <label for="star-5">
                      <input type="radio" id="star-5" name="star_radio" value="1">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>
                    </label>
                  </div>
                  <div class="rating-desc" style="margin: 20px">
                    <textarea name="rating_desc" id="ratingDesc" cols="40" rows="5"  style="resize:none" placeholder="Berikan Review Anda"></textarea>
                  </div>
                    <input type="submit" value="Kirim" style="margin: 20px">
                </form>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> 
    @endif   
    
    @if($orderStatus =='diterima')
        <div id="message-box" class="alert alert-dismissible fade show" role="alert">
            <h3>Silahkan Tunggu</h3>
            <h3>Merchant Sedang Menuju Rumahmu</h3>
            <div style="margin:15px;font-size:25px">
                <img src="images/profileIcon.png" style="width:20%;margin-top:10px"loading="lazy" alt="">
            </div>
            
            <strong>{{$order->merchant_username}}</strong>
            <div class="recent-order" style="margin:15px;font-size:25px">
                <h4>Order ID: {{$order->id}}</h4>
                <h4>Biaya: Rp. {{$order->total_order}}</h4>
                <h4>Pembayaran: {{$order->payment_by}}</h4>
                <h4>Status Pembayaran: 
                    @if($order->payment_status=='paid')
                    Sudah Dibayar
                    @else
                    Belum Dibayar
                    @endif
                </h4>
            </div>

            <div class="recent-order" style="margin:15px;font-size:25px">
                <h4>Alamat Customer:</h4>
                <h6>{{$customer->actualAddress}}</h6>
                <h4>Alamat Merchant:</h4>
                <h6>{{$merchant->actualAddress}}</h6>
            </div>
                
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> 

        @elseif($orderStatus =='progress')

        <div id="message-box" class="alert alert-dismissible fade show" role="alert">
            <h3>Pesanan Diproses</h3>
            <div style="margin:15px;font-size:25px">
                <img src="images/profileIcon.png" style="width:20%;margin-top:10px"loading="lazy" alt="">
            </div>
            
            <strong>{{$order->merchant_username}}</strong>
            <div class="recent-order" style="margin:15px;font-size:25px">
                <h4>Order ID: {{$order->id}}</h4>
                <h4>Biaya: Rp. {{$order->total_order}}</h4>
                <h4>Pembayaran: {{$order->payment_by}}</h4>
                <h4>Status Pembayaran: 
                    @if($order->payment_status=='paid')
                    Sudah Dibayar
                    @else
                    Belum Dibayar
                    @endif
                </h4>
            </div>

            <div class="recent-order" style="margin:15px;font-size:25px">
                <h4>Alamat Customer:</h4>
                <h6>{{$customer->actualAddress}}</h6>
                <h4>Alamat Merchant:</h4>
                <h6>{{$merchant->actualAddress}}</h6>
            </div>
                
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> 
    @endif 
    
    <div class="profile">

        <table>
            <tr>
                <td>
                    <img src="{{asset('storage/fotoProfilCustomer/'.$customer->image)}}" id="profileImage">
                </td>
                <td>
                    <div class="profile-identity">
                        <h2>
                            {{ $customer->customer_username }} 
                        </h2>
                        <h3>    
                            Alamat Customer :
                        </h3>
                        <p style="font-size:20px"> {{ $customer->actualAddress}},
                            Kelurahan {{ $customer->village}},
                            Kecamatan {{ $customer->district}},
                            <br>
                            {{ $customer->regency}},
                            Provinsi{{ $customer->province}}
                       </p>
                </div>
                </td>
            </tr>
        </table>
    </div>    
<div class="map address">
    
    <h2 style="margin: 0px 0px 20px 30px;">Merchant Disekitarmu</h2>
    <div id='map' style='width: 100%; height: 400px; margin: 20px 0px'></div>
<script>
      mapboxgl.accessToken = 'pk.eyJ1Ijoic2F0cmlpYWRhZmZhIiwiYSI6ImNsaDA5Z3lsYzBkOXozbHBxMmtzaTE0djUifQ.GvxtJBL6YN8PIrh5t2pT9g';
      var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v12',
        center: [ 112.63040488435163, -7.966057035517006],
        zoom: 13
      });


    map.addControl( new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        mapboxgl: mapboxgl
        })
    );

    map.addControl(new mapboxgl.GeolocateControl({
        positionOptions: {
        enableHighAccuracy: true
        },
        trackUserLocation: true,
        showUserHeading: true
        })
    );

    map.addControl(new mapboxgl.NavigationControl());

    
    

    @foreach($allMerchants as $allMerchant)
        
        // Create a default Marker and add it to the map.
    const marker_{{$allMerchant->id}} = new mapboxgl.Marker()
    .setLngLat([ {{$allMerchant->longitude}},{{$allMerchant->latitude}}])
    .addTo(map);

    @endforeach
</script>
</div>

<div class="options address">
        <h2 style="margin: 0px 0px 20px 30px;">Jasa Yang ingin Dicari</h2>
                    <form action="/search" method="POST">
                        @csrf
                        <div class="radio-inputs">
                            <label>
                                <input class="radio-input" type="radio" name="service" value="brangkas">
                                    <div class="radio-tile">
                                        <div class="radio-icon">
                                    <svg height="200px" width="200px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path style="fill:#7F8499;" d="M384,466.286l7.673,38.365c0.855,4.273,4.607,7.35,8.966,7.35h21.581 c4.358,0,8.111-3.077,8.966-7.35l7.672-38.365H384z"></path> <path style="fill:#7F8499;" d="M73.143,466.286l7.673,38.365c0.855,4.273,4.607,7.35,8.966,7.35h21.581 c4.358,0,8.111-3.077,8.966-7.35L128,466.286H73.143z"></path> </g> <path style="fill:#9497a4;" d="M438.857,475.429H73.143c-15.149,0-27.429-12.28-27.429-27.429V27.429 C45.714,12.28,57.994,0,73.143,0h365.714c15.149,0,27.429,12.28,27.429,27.429V448C466.286,463.149,454.006,475.429,438.857,475.429 z"></path> <path style="fill:#9497a4;" d="M64,420.571C64,235.247,172.122,75.189,328.721,0H73.143C57.994,0,45.714,12.28,45.714,27.429V448 c0,13.115,9.218,24.046,21.52,26.753C65.175,456.966,64,438.91,64,420.571z"></path> <path style="fill:#7F8499;" d="M411.429,429.714H100.571c-5.054,0-9.143-4.089-9.143-9.143V54.857c0-5.049,4.089-9.143,9.143-9.143 h310.857c5.054,0,9.143,4.094,9.143,9.143v365.714C420.571,425.625,416.482,429.714,411.429,429.714z M109.714,411.429h292.571V64 H109.714V411.429z"></path> <g> <path style="fill:#707487;" d="M109.714,164.571H91.429c-5.049,0-9.143-4.094-9.143-9.143v-36.571c0-5.049,4.094-9.143,9.143-9.143 h18.286c5.049,0,9.143,4.094,9.143,9.143v36.571C118.857,160.478,114.763,164.571,109.714,164.571z"></path> <path style="fill:#707487;" d="M109.714,365.714H91.429c-5.049,0-9.143-4.094-9.143-9.143V320c0-5.049,4.094-9.143,9.143-9.143 h18.286c5.049,0,9.143,4.094,9.143,9.143v36.571C118.857,361.621,114.763,365.714,109.714,365.714z"></path> </g> <path style="fill:#464655;" d="M310.857,155.429c-5.054,0-9.143,4.089-9.143,9.143v18.286H320v-18.286 C320,159.518,315.911,155.429,310.857,155.429z"></path> <circle style="fill:#5B5D6E;" cx="310.857" cy="237.714" r="64"></circle> <circle style="fill:#464655;" cx="310.857" cy="237.714" r="27.429"></circle> </g></svg>                                        </div>
                                        <div class="radio-label">Tukang Kunci Brangkas</div>
                                    </div>
                            </label>
                            <label>
                                <input class="radio-input" type="radio" name="service" value="motor">
                                <div class="radio-tile">
                                    <div class="radio-icon">
                                       <svg  class="svg-kecil" height="200px" width="200px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-50.9 -50.9 610.80 610.80" xml:space="preserve" fill="#000000" transform="matrix(-1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle style="fill:#ffffff;" cx="254.5" cy="254.5" r="254.5"></circle> <g> <path style="fill:#414753;" d="M169.9,161.6c-1.1,0-2.3-0.2-3.3-0.7c-3.9-1.8-5.6-6.5-3.7-10.4l18.2-38.5c1.3-2.7,4-4.5,7.1-4.5 h49.5c4.3,0,7.8,3.5,7.8,7.8s-3.5,7.8-7.8,7.8h-44.6l-16.1,34C175.7,159.9,172.9,161.6,169.9,161.6z"></path> <path style="fill:#414753;" d="M113.7,148.8c-0.1,0-0.2,0-0.4,0v59.4c0.1,0,0.2,0,0.4,0c16.4,0,29.7-13.3,29.7-29.7 S130.1,148.8,113.7,148.8z"></path> <circle style="fill:#414753;" cx="91.2" cy="342.8" r="58.8"></circle> </g> <circle style="fill:#4a4a4a;" cx="91.2" cy="342.8" r="30.6"></circle> <circle style="fill:#414753;" cx="379.1" cy="342.8" r="58.8"></circle> <circle style="fill:#4a4a4a;" cx="379.1" cy="342.8" r="30.6"></circle> <path style="fill:#6EB1E1;" d="M409.4,224.1h-147c-13.3,0-24.1,10.8-24.1,24.1c0,11.3,7.8,20.9,18.8,23.5 c17.4,4.1,33.2,15.7,33.2,29.8c0,14.7-8.8,29.8-25,29.8s-108.1,15.3-98.2-61.2C177,193.6,195,158.5,195,158.5l-13.4-20l-38.7,18.9 l-29.7,76.5c0,0-69.7-1.9-83.7,60.2c0,0,110.7-4.4,124.2,65.9h325.9v-44.1C479.6,315.9,463.4,224.1,409.4,224.1z"></path> <path style="fill:#4485C5;" d="M144.8,337.6c4.1,6.5,7.2,13.9,8.9,22.4h325.9v-22.4H144.8z"></path> <g> <path style="fill:#414753;" d="M327,224.1h-79.5c-3.3,0-6-2.7-6-6v-28.9c0-3.3,2.7-6,6-6H327c3.3,0,6,2.7,6,6v28.9 C333.1,221.4,330.3,224.1,327,224.1z"></path> <path style="fill:#414753;" d="M418.3,224.1h-69.7c-3.3,0-6-2.7-6-6v-28.9c0-3.3,2.7-6,6-6h69.7c3.3,0,6,2.7,6,6v28.9 C424.3,221.4,421.6,224.1,418.3,224.1z"></path> <path style="fill:#414753;" d="M458.4,236.6h-24.9c-2.9,0-5.2-2.3-5.2-5.2v-81.7c0-2.9,2.3-5.2,5.2-5.2h24.9c2.9,0,5.2,2.3,5.2,5.2 v81.7C463.6,234.3,461.2,236.6,458.4,236.6z"></path> </g> <path style="fill:#6EB1E1;" d="M149.5,346.5c-1-2.8-2.5-5.7-4.7-8.9C146.6,340.4,148.1,343.4,149.5,346.5z"></path> <path style="fill:#89CBF4;" d="M113.1,234c0,0-69.7-1.9-83.7,60.2c0,0,83-3.2,114,41.5C94,263.8,113.1,234,113.1,234z"></path> <path style="fill:#4485C5;" d="M35.9,276.1c-2.7,5.3-4.9,11.3-6.5,18.1c0,0,83-3.2,114,41.5c-11.2-16.3-18.8-30.3-24-42.4 C89,277.9,55,275.8,35.9,276.1z"></path> <g> <path style="fill:#89CBF4;" d="M409.6,276h-79.4c-1.9,0-3.4-1.5-3.4-3.4v-16.1c0-1.9,1.5-3.4,3.4-3.4h79.4c1.9,0,3.4,1.5,3.4,3.4 v16.2C413,274.5,411.4,276,409.6,276z"></path> <path style="fill:#89CBF4;" d="M409.6,315h-79.4c-1.9,0-3.4-1.5-3.4-3.4v-16.1c0-1.9,1.5-3.4,3.4-3.4h79.4c1.9,0,3.4,1.5,3.4,3.4 v16.2C413,313.5,411.4,315,409.6,315z"></path> </g> </g></svg>
                                    </div>
                                    <div class="radio-label">Tukang Kunci Motor</div>
                                </div>
                            </label>
                            <label>
                                <input class="radio-input" type="radio" name="service" value="mobil">
                                <div class="radio-tile">
                                    <div class="radio-icon">
                                    <svg viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#5e5e5e" stroke="#5e5e5e"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M200.8 353.9c-8 0-14.5-6.5-14.5-14.5v-60.9c0-8 6.5-14.5 14.5-14.5s14.5 6.5 14.5 14.5v60.9c0 8-6.5 14.5-14.5 14.5z" fill="#A4A9AD"></path><path d="M200.8 263.9c-8 0-14.5 6.5-14.5 14.5v25.5h29v-25.5c0-8-6.5-14.5-14.5-14.5z" fill=""></path><path d="M597.5 353.9c-8 0-14.5-6.5-14.5-14.5v-60.9c0-8 6.5-14.5 14.5-14.5s14.5 6.5 14.5 14.5v60.9c0 8-6.4 14.5-14.5 14.5z" fill="#A4A9AD"></path><path d="M597.5 263.9c-8 0-14.5 6.5-14.5 14.5v25.5h29v-25.5c0-8-6.4-14.5-14.5-14.5z" fill=""></path><path d="M635.3 287.2H163c-8 0-14.5-6.5-14.5-14.5s6.5-14.5 14.5-14.5h472.3c8 0 14.5 6.5 14.5 14.5s-6.5 14.5-14.5 14.5z" fill="#A4A9AD"></path><path d="M839.9 390h29v91.6h-29z" fill="#333E48"></path><path d="M840 390v29.2c4.6 1.6 9.4 2.4 14.5 2.4s10-0.9 14.5-2.4V390h-29z" fill=""></path><path d="M854.5 377.1m-29.7 0a29.7 29.7 0 1 0 59.4 0 29.7 29.7 0 1 0-59.4 0Z" fill="#A4A9AD"></path><path d="M901.7 478H693.1l-20.3-119.7C669.7 340 652 325 633.4 325H179c-18.6 0-36.3 15-39.4 33.3L92.8 634.2c-3.1 18.3 9.5 33.3 28.1 33.3h780.8c18.6 0 33.8-15.2 33.8-33.8v-122c0-18.5-15.2-33.7-33.8-33.7z" fill="#0071CE"></path><path d="M866.2 565.3h69.3v47h-69.3z" fill="#FFB819"></path><path d="M877.2 612.3h-15.9c-3.7 0-6.8-3-6.8-6.7V572c0-3.7 3-6.7 6.8-6.7h15.9v47z" fill="#FFFFFF"></path><path d="M104.5 565.3l-8 47h60.3v-47z" fill="#FFB819"></path><path d="M145.9 612.3h15.9c3.7 0 6.7-3 6.7-6.7V572c0-3.7-3-6.7-6.7-6.7h-15.9v47z" fill="#FFFFFF"></path><path d="M403.6 667.5c0-65.6-53.2-118.8-118.8-118.8S166 601.9 166 667.5h237.6z" fill=""></path><path d="M284.8 667.5m-97.5 0a97.5 97.5 0 1 0 195 0 97.5 97.5 0 1 0-195 0Z" fill="#333E48"></path><path d="M284.8 667.5m-49.4 0a49.4 49.4 0 1 0 98.8 0 49.4 49.4 0 1 0-98.8 0Z" fill="#A4A9AD"></path><path d="M832.6 667.5c0-65.6-53.2-118.8-118.8-118.8S595 601.9 595 667.5h237.6z" fill=""></path><path d="M713.8 667.5m-97.5 0a97.5 97.5 0 1 0 195 0 97.5 97.5 0 1 0-195 0Z" fill="#333E48"></path><path d="M713.8 667.5m-49.4 0a49.4 49.4 0 1 0 98.8 0 49.4 49.4 0 1 0-98.8 0Z" fill="#A4A9AD"></path><path d="M961.3 659.6c0 9.9-8.1 18-18 18h-40.5c-9.9 0-18-8.1-18-18v-29.2c0-9.9 8.1-18 18-18h40.5c9.9 0 18 8.1 18 18v29.2zM139.3 659.6c0 9.9-8.1 18-18 18H80.8c-9.9 0-18-8.1-18-18v-29.2c0-9.9 8.1-18 18-18h40.5c9.9 0 18 8.1 18 18v29.2z" fill="#A4A9AD"></path><path d="M458.5 379.2c0-8.5 7-15.5 15.5-15.5h126.9c8.5 0 15.5 7 15.5 15.5v69.9c0 8.5-7 15.5-15.5 15.5h-127c-8.5 0-15.5-7-15.5-15.5v-69.9zM199.7 378.9c1.4-8.4 9.6-15.3 18.1-15.3h138.5c8.5 0 15.5 7 15.5 15.5V449c0 8.5-7 15.5-15.5 15.5H200.7c-8.5 0-14.3-6.9-12.9-15.3l11.9-70.3z" fill="#333E48"></path><path d="M524.5 518.7H472c-8 0-14.5-6.5-14.5-14.5s6.5-14.5 14.5-14.5h52.5c8 0 14.5 6.5 14.5 14.5s-6.5 14.5-14.5 14.5zM242.1 518.7h-52.5c-8 0-14.5-6.5-14.5-14.5s6.5-14.5 14.5-14.5h52.5c8 0 14.5 6.5 14.5 14.5s-6.5 14.5-14.5 14.5z" fill="#00B3E3"></path><path d="M600.9 363.7h-127c-8.5 0-15.5 7-15.5 15.5v17.3c0-8.5 7-15.5 15.5-15.5h126.9c8.5 0 15.5 7 15.5 15.5v-17.3c0-8.6-6.9-15.5-15.4-15.5zM356.2 363.7H217.8c-8.5 0-16.6 6.9-18.1 15.3l-2.8 16.5c1.8-8 9.7-14.4 17.9-14.4h141.5c8.5 0 15.5 7 15.5 15.5v-17.3c-0.1-8.7-7-15.6-15.6-15.6z" fill=""></path></g></svg>                                </div>
                                <div class="radio-label">Tukang Kunci Mobil</div>
                                </div>
                            </label>
                            <label>
                                <input class="radio-input" type="radio" name="service" value="immobilizer">
                                <div class="radio-tile">
                                    <div class="radio-icon">
                                    <svg class="svg-kecil"  height="200px" width="200px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000" transform="matrix(-1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path style="fill:#C6421E;" d="M498.455,197.52L392.714,303.261c-18.059,18.068-47.347,18.068-65.406,0l-53.005-52.996 c-18.059-18.068-18.059-47.347,0-65.406l105.75-105.741c18.059-18.059,47.338-18.059,65.397,0l53.005,53.005 C516.514,150.182,516.514,179.461,498.455,197.52"></path> <path style="fill:#992C13;" d="M452.948,177.101l-7.871,7.871c-6.934,6.934-18.163,6.934-25.088,0l-27.657-27.648 c-6.925-6.925-6.925-18.163,0-25.088l7.871-7.88c6.934-6.925,18.163-6.925,25.097,0l27.648,27.657 C459.873,158.938,459.873,170.176,452.948,177.101"></path> <path style="fill:#CDD1D3;" d="M221.47,320.396l6.595,32.959l-32.968-6.587l-50.54,50.54l4.391,21.973l-21.973-4.391l-4.165,4.165 c-17.408,17.408-29.757,39.216-35.719,63.089c-1.84,7.359,4.825,14.032,12.184,12.193c23.882-5.97,45.681-18.319,63.089-35.727 l37.133-37.124l-4.4-21.981l21.981,4.4L320.451,296.41l-39.554-39.554L221.47,320.396z"></path> <g> <path style="fill:#25AD87;" d="M8.678,303.727c-4.799,0-8.678-3.879-8.678-8.678C0,139.331,118.168,17.354,269.017,17.354 c4.799,0,8.678,3.879,8.678,8.678s-3.879,8.678-8.678,8.678c-141.121,0-251.661,114.358-251.661,260.339 C17.356,299.848,13.477,303.727,8.678,303.727"></path> <path style="fill:#25AD87;" d="M52.068,303.727c-4.799,0-8.678-3.879-8.678-8.678c0-131.393,99.111-234.305,225.627-234.305 c4.799,0,8.678,3.879,8.678,8.678c0,4.799-3.879,8.678-8.678,8.678c-116.788,0-208.271,95.293-208.271,216.949 C60.746,299.848,56.867,303.727,52.068,303.727"></path> <path style="fill:#25AD87;" d="M95.458,303.727c-4.799,0-8.678-3.879-8.678-8.678c0-105.272,81.755-190.915,182.237-190.915 c4.799,0,8.678,3.879,8.678,8.678s-3.879,8.678-8.678,8.678c-90.919,0-164.881,77.859-164.881,173.559 C104.136,299.848,100.257,303.727,95.458,303.727"></path> </g> </g> </g></svg>                                    </div>
                                    <div class="radio-label">Tukang Kunci Immobilizer</div>
                                </div>
                            </label>
                            <label>
                                <input class="radio-input" type="radio" name="service" value="rumah">
                                <div class="radio-tile">
                                    <div class="radio-icon">
                                    <svg height="200px" width="200px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.001 512.001" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#FFE77C;" d="M456.345,189.218V512H55.656V189.218L256.005,66.783L456.345,189.218z"></path> <path style="fill:#FFFFA6;" d="M189.223,200.348L189.223,200.348c0-24.588,19.932-44.522,44.521-44.522h44.521 c24.588,0,44.521,19.933,44.521,44.522l0,0c0,24.588-19.932,44.522-44.521,44.522h-44.521 C209.157,244.87,189.223,224.936,189.223,200.348z M345.047,278.261H166.964c-18.441,0-33.39,14.949-33.39,33.391v100.174 c0,18.442,14.949,33.391,33.39,33.391h178.084c18.441,0,33.39-14.949,33.39-33.391V311.652 C378.437,293.21,363.488,278.261,345.047,278.261z"></path> <path style="fill:#F4AB53;" d="M144.698,11.131v133.565H77.917V11.131C77.917,4.983,82.9,0,89.047,0h44.521 C139.715,0,144.698,4.983,144.698,11.131z"></path> <path style="fill:#A7E5CB;" d="M356.172,311.652v100.174c0,6.147-4.983,11.13-11.13,11.13H166.958c-6.147,0-11.13-4.983-11.13-11.13 V311.652c0-6.147,4.983-11.13,11.13-11.13h178.084C351.189,300.522,356.172,305.505,356.172,311.652z M239.305,222.609h33.391 c12.295,0,22.261-9.966,22.261-22.261l0,0c0-12.295-9.966-22.261-22.261-22.261h-33.391c-12.295,0-22.261,9.966-22.261,22.261l0,0 C217.045,212.643,227.011,222.609,239.305,222.609z"></path> <path style="fill:#FF8D40;" d="M4.942,218.064c-9.651-15.471-4.735-35.716,10.979-45.217L238.527,38.253 c10.72-6.481,24.229-6.481,34.948,0l222.604,134.594c15.714,9.501,20.63,29.746,10.979,45.217 c-6.303,10.104-17.263,15.674-28.485,15.675c-5.959,0-11.992-1.569-17.443-4.866L256,104.845L50.87,228.873 C35.155,238.375,14.593,233.536,4.942,218.064z M503.652,495.305H8.357c-4.61,0-8.348,3.738-8.348,8.348S3.747,512,8.357,512 h495.295c4.61,0,8.348-3.738,8.348-8.348S508.263,495.305,503.652,495.305z"></path> <path style="fill:#FFFFA6;" d="M328.351,345.044c0,4.61-3.738,8.348-8.348,8.348h-55.651v69.565c0,4.61-3.738,8.348-8.348,8.348 s-8.348-3.738-8.348-8.348v-69.565H153.05c-4.61,0-8.348-3.738-8.348-8.348c0-4.61,3.738-8.348,8.348-8.348h94.606v-36.174 c0-4.61,3.738-8.348,8.348-8.348s8.348,3.738,8.348,8.348v36.174h55.651C324.614,336.696,328.351,340.434,328.351,345.044z"></path> </g></svg>                                    </div>
                                    <div class="radio-label">Tukang Kunci Rumah</div>
                                </div>
                            </label>
                    </div>
          <div style="margin: 30px 0px;">
            <input type="submit" value="Konfirmasi">
          </div>
        </form>
        @if (session('demandError'))
        <div class="alert alert-danger" role="alert">
          {{ session('demandError') }}
        </div>
        @endif
    @endsection
</body>
</html>