<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('CSS/accesories.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/login&regisImage.css')}}"> 
    <title>{{$title}}</title>
    <style>
      /* table, tr, td {
        border: 1px solid black;
      } */

      img{
        width: 17%;
      }
      hr{
        margin-top: 0px;
      }
      textarea{
        width: 100%;
      }

      input[type='text'],[type='email']{
        width: 100%;
      }
    </style>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
</head>
<body id="register">
  <div class="container">
    <div class="setting1-content">
      <div>
        <h2>Fill Your Data Requirement</h2>
    </div>
    <form action="{{ route('merchant-data-update', $merchant->merchant_username) }}" id="userSetting" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="img-con">
        <div class="user-input-box">
          <label for="image">Upload Profile Picture</label><br>
          <input type="file" id="image" name="image" onchange="previewImage(event)">
        </div>
        <div class="img-container">
          <img id="image-preview" src="#" alt="Preview">
          
        </div>
        @error('image')
            <p class="p-error">{{$message}}</p>
            @enderror
      </div>
    <hr>

    <table>
        
        <tr>
          <td>
            <div class="user-input-box">
            <label for="userName">User Name</label><br>
            <input type="text"
                   id="userName"
                   disabled
                   name="userName"
                   value="{{$merchant->merchant_username}}">
                   
          </div>
        </td>
          <td>
            <div class="user-input-box">
            <label for="fullName">Full Name</label><br>
            <input type="text"
                   id="fullName"
                   disabled
                   name="fullName"
                   value="{{$merchant->merchant_name}}">
          </div>
        </td>  
        </tr>
        <tr>
          <td>
            <div class="user-input-box">
              <label for="phoneNumber">Phone Number</label><br>
              <input type="text"
                     disabled
                     id="phoneNumber"
                     name="phoneNumber"
                     value="{{$merchant->phoneNumber}}">
            </div>
          </td>
          <td rowspan="2">
            <div class="user-input-role">
              <label class="role">Expertize</label>
                <div class="role-category">
                <div class="opt">
                  <input type="checkbox"
                       name="exp[]"
                      
                       value="rumah">
                <label for="rumah" >Kunci Rumah</label>
                <div class="user-input-box" style="margin:5px 20px;height:20px;width:200px;display:flex">
                  <input style="width:20px;margin-right:24px;height:15px;font-size:10px" type="text" value="Rp." disabled>
                  <input style="width:100px;height:15px;font-size:10px" onkeyup="formatRupiahRumah(this.value)" type="text" name="price[]" id="harga_rumah" disabled>
                </div>
                </div>
                <div class="opt">
                  <input type="checkbox"
                       name="exp[]"
                      
                       value="brangkas">
                <label for="brangkas" >Kunci Brangkas</label>
                <div class="user-input-box" style="margin:5px 20px;height:20px;width:200px;display:flex">
                  <input style="width:20px;margin-right:24px;height:15px;font-size:10px" type="text" value="Rp." disabled>
                  <input style="width:100px;height:15px;font-size:10px" onkeyup="formatRupiahBrangkas(this.value)" type="text" name="price[]" id="harga_brangkas" disabled>
                </div>
                </div>
                <div class="opt">
                  <input type="checkbox"
                       name="exp[]"
                      
                       value="mobil">
                <label for="mobil" >Kunci Mobil</label>
                <div class="user-input-box" style="margin:5px 20px;height:20px;width:200px;display:flex">
                  <input style="width:20px;margin-right:24px;height:15px;font-size:10px" type="text" value="Rp." disabled>
                  <input style="width:100px;height:15px;font-size:10px" onkeyup="formatRupiahMobil(this.value)" type="text" name="price[]" id="harga_mobil" disabled>
                </div>
                </div>
                <div class="opt">
                  <input type="checkbox"
                       name="exp[]"
                      
                       value="motor">
                <label for="motor" >Kunci Motor</label>
                <div class="user-input-box" style="margin:5px 20px;height:20px;width:200px;display:flex">
                  <input style="width:20px;margin-right:24px;height:15px;font-size:10px" type="text" value="Rp." disabled>
                  <input style="width:100px;height:15px;font-size:10px" onkeyup="formatRupiahMotor(this.value)" type="text" name="price[]" id="harga_motor" disabled>
                </div>
                </div>
                <div class="opt">
                  <input type="checkbox"
                       name="exp[]"
                      
                       value="immobilizer">
                <label for="immobilizer" >Immobilizer</label>
                <div class="user-input-box" style="margin:5px 20px;height:20px;width:200px;display:flex">
                  <input style="width:20px;margin-right:24px;height:15px;font-size:10px" type="text" value="Rp." disabled>
                  <input style="width:100px;height:15px;font-size:10px" onkeyup="formatRupiahImmobilizer(this.value)" type="text" name="price[]" id="harga_immobilizer" disabled>
                </div>
                </div>
                </div>
            </div>
          </td>
        </tr>
        <tr>
        </td>
          <td>
            <div class="user-input-box">
            <label for="email">Email</label><br>
            <input type="email"
                   disabled
                   id="email"
                   name="email"
                   value="{{$merchant->merchant_email}}">
          </div>
        </td>  
        </tr>
        <tr style="height:10px">
          <td colspan="2">
            <div class="user-input-box">
              <label>Alamat Anda</label><br>
            </div>
          </td>
        </tr>
        <tr>
          <td style="padding-right:10px">
              <select id="provinsi" name="provinsi">
                <option>Pilih Provinsi...</option>
                @foreach($provinces as $provice)
                <option value="{{$provice->id}}">{{$provice->name}}</option>
                @endforeach
              </select>
            </div>
          <td style="padding-right:10px">
              <select id="kota" name="kota">
                <option>Pilih Kota/Kabupaten...</option>
              </select>
            </div>
        </tr>
        <tr>
          <td style="padding-right:10px">
              <select id="kecamatan" name="kecamatan">
                <option>Pilih Kecamatan...</option>
              </select>
            </div>
          <td style="padding-right:10px">
              <select id="kelurahan" name="kelurahan">
                <option>Pilih Kelurahan/Desa...</option>
              </select>
            </div>
        </tr>
        <tr>
        <td colspan="2">
            <div class="user-input-box">
              <textarea name="actualAddress" id="actualAddress" form="userSetting" placeholder="Masukkan Alamat Anda"></textarea>
            </div>
          </td>
        </tr>
        <tr>

          <input type="hidden" name="longitude" value="" id="lngInput">
          <input type="hidden" name="latitude" value="" id="latInput">
          <td colspan="2">
            <div class="user-input-box">
            <label>Pilih Lokasi Anda</label>
            <p>Klik lokasi pada map</p>
            <br>
            </div>
            <div class="map"style='margin-right:10px'>
              <div id='map' style='width: 100%; height: 200px;'></div>
              <script>
                mapboxgl.accessToken = 'pk.eyJ1Ijoic2F0cmlpYWRhZmZhIiwiYSI6ImNsaDA5Z3lsYzBkOXozbHBxMmtzaTE0djUifQ.GvxtJBL6YN8PIrh5t2pT9g';
                var map = new mapboxgl.Map({
                  container: 'map',
                  style: 'mapbox://styles/mapbox/streets-v12',
                  center: [ 112.63040488435163, -7.966057035517006],
                  zoom: 13
                });
          
               // Add geolocate control to the map.
                  map.addControl(
                  new mapboxgl.GeolocateControl({
                  positionOptions: {
                  enableHighAccuracy: true
                  },
                  // When active the map will receive updates to the device's location as it changes.
                  trackUserLocation: true,
                  // Draw an arrow next to the location dot to indicate which direction the device is heading.
                  showUserHeading: true
                  }));
          
              // Create a default Marker and add it to the map.
          const marker1 = new mapboxgl.Marker()
          .setLngLat([ 113.22233379258826,-7.745519921655442])
          .addTo(map);
          
          const marker2 = new mapboxgl.Marker()
          .setLngLat([113.21546733746261, -7.743585084192468])
          .addTo(map);
          
          
          var marker = new mapboxgl.Marker();

          var lngInput = document.querySelector('#lngInput');
          var latInput = document.querySelector('#latInput');

          function add_marker(event) {
            var coordinates = event.lngLat;
            console.log('Lng:', coordinates.lng, 'Lat:', coordinates.lat);
            marker.setLngLat(coordinates).addTo(map);
                    
            lngInput.value = coordinates.lng;
            latInput.value = coordinates.lat;
                  
            document.getElementById('coordinates').innerHTML =
              'Longitude: ' + coordinates.lng + '<br />Latitude: ' + coordinates.lat;
          }
                  
          map.on('click', add_marker);
          
              </script>

@error('longitude')
<p class="p-error">Klik lokasi anda pada peta!</p>
@enderror
              
              
          </td>
        </tr>
      </table>
      <table class="buttons">
        <tr>
          <td>
            <div id="coordinates"></div>
          </td>
        </tr>
        <tr>
          <td>
            <input type="submit" class="btn btn-submit2" value="Save">
          </td>
      </table>
      </form>
    </div>
  </div>


    <script>
      const rumahCheckbox = document.querySelector('input[name="exp[]"][value="rumah"]');
      const rumahPriceInput = document.querySelector('input[id="harga_rumah"]');
      const brangkasCheckbox = document.querySelector('input[name="exp[]"][value="brangkas"]');
      const brangkasPriceInput = document.querySelector('input[id="harga_brangkas"]');
      const mobilCheckbox = document.querySelector('input[name="exp[]"][value="mobil"]');
      const mobilPriceInput = document.querySelector('input[id="harga_mobil"]');
      const motorCheckbox = document.querySelector('input[name="exp[]"][value="motor"]');
      const motorPriceInput = document.querySelector('input[id="harga_motor"]');
      const immobilizerCheckbox = document.querySelector('input[name="exp[]"][value="immobilizer"]');
      const immobilizerPriceInput = document.querySelector('input[id="harga_immobilizer"]');
    
      rumahCheckbox.addEventListener('change', function() {
        if (rumahCheckbox.checked) {
          rumahPriceInput.disabled = false;
        } else {
          rumahPriceInput.disabled = true;
        }
      });
    
      brangkasCheckbox.addEventListener('change', function() {
        if (brangkasCheckbox.checked) {
          brangkasPriceInput.disabled = false;
        } else {
          brangkasPriceInput.disabled = true;
        }
      });
    
      mobilCheckbox.addEventListener('change', function() {
        if (mobilCheckbox.checked) {
          mobilPriceInput.disabled = false;
        } else {
          mobilPriceInput.disabled = true;
        }
      });
    
      motorCheckbox.addEventListener('change', function() {
        if (motorCheckbox.checked) {
          motorPriceInput.disabled = false;
        } else {
          motorPriceInput.disabled = true;
        }
      });
    
      immobilizerCheckbox.addEventListener('change', function() {
        if (immobilizerCheckbox.checked) {
          immobilizerPriceInput.disabled = false;
        } else {
          immobilizerPriceInput.disabled = true;
        }
      });


      function formatRupiahRumah(angka) {
      // Menghilangkan semua karakter kecuali angka
      var angkaClean = angka.replace(/[^\d]/g, '');

      // Menambahkan titik setiap tiga angka dari kiri
      var result = angkaClean.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

      // Mengisi hasil formatting ke dalam input harga
      document.getElementById('harga_rumah').value = result;
      
      }

      function formatRupiahMotor(angka) {
      // Menghilangkan semua karakter kecuali angka
      var angkaClean = angka.replace(/[^\d]/g, '');

      // Menambahkan titik setiap tiga angka dari kiri
      var result = angkaClean.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

      // Mengisi hasil formatting ke dalam input harga
      document.getElementById('harga_motor').value = result;
      }

      function formatRupiahMobil(angka) {
      // Menghilangkan semua karakter kecuali angka
      var angkaClean = angka.replace(/[^\d]/g, '');

      // Menambahkan titik setiap tiga angka dari kiri
      var result = angkaClean.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

      // Mengisi hasil formatting ke dalam input harga
      document.getElementById('harga_mobil').value = result;
      }

      function formatRupiahBrangkas(angka) {
      // Menghilangkan semua karakter kecuali angka
      var angkaClean = angka.replace(/[^\d]/g, '');

      // Menambahkan titik setiap tiga angka dari kiri
      var result = angkaClean.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

      // Mengisi hasil formatting ke dalam input harga
      document.getElementById('harga_brangkas').value = result;
      }

      function formatRupiahImmobilizer(angka) {
      // Menghilangkan semua karakter kecuali angka
      var angkaClean = angka.replace(/[^\d]/g, '');

      // Menambahkan titik setiap tiga angka dari kiri
      var result = angkaClean.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

      // Mengisi hasil formatting ke dalam input harga
      document.getElementById('harga_immobilizer').value = result;
      }
    </script>

    <script>
      $(function(){
        $.ajaxSetup({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        $(function(){

          $('#provinsi').on('change',function(){
            let  id_provinsi = $('#provinsi').val();

            console.log(id_provinsi);
            $.ajax({

              type: 'POST',
              url: "{{route('get-regency-merchant')}}",
              data: {id_provinsi:id_provinsi},
              cache: false,

              success: function(msg){
                $('#kota').html(msg);
                $('#kecamatan').html('Pilih Kecamatan...');
                $('#kelurahan').html('Pilih Kelurahan/Desa...');
              },

              error: function(data){
                console.log('error :',data);
              }
            })
          });

          $('#kota').on('change',function(){
            let  id_kota = $('#kota').val();

            console.log(id_kota);
            $.ajax({

              type: 'POST',
              url: "{{route('get-district-merchant')}}",
              data: {id_kota:id_kota},
              cache: false,

              success: function(msg){
                $('#kecamatan').html(msg);
                $('#kelurahan').html('Pilih Kelurahan/Desa...');
              },

              error: function(data){
                console.log('error :',data);
              }
            })
          });

          $('#kecamatan').on('change',function(){
            let  id_kecamatan = $('#kecamatan').val();

            console.log(id_kecamatan);
            $.ajax({

              type: 'POST',
              url: "{{route('get-village-merchant')}}",
              data: {id_kecamatan:id_kecamatan},
              cache: false,

              success: function(msg){
                $('#kelurahan').html(msg);
              },

              error: function(data){
                console.log('error :',data);
              }
            })
          });


        })
      })
    </script>

<script>
  function previewImage(event) {

    var input = event.target;
    var preview = document.getElementById('image-preview');
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function () {
        preview.src = reader.result;
        preview.style.display = 'block';
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  </script>
  
</div>
</body>
</html>

