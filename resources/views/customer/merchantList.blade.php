<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/pages.css')}}" />
    <link rel="stylesheet" href="{{asset('css/index.css')}}" />
    @extends('customer.custSidebar')
    <style>
        td {
            padding:25px 25px;
            
        }
        table{
            width: 100%;
        }
    </style>
</head>
<body>
    @section('content')    
    <button class="btn-back" onclick="window.history.back()">Kembali</button>    
        <div class="box-container" style="display: block">
            <h2 style="margin: 0px 0px 20px 30px;"> Merchant List</h2>
        <p>Menampilkan hasil pencarian : tukang kunci {{$data}}</p>
            @if ($dataKosong)
                <div>
                    <div class="alert alert-danger" style="text-align:center;height:70px; box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);" role="alert">
                    <h3>Maaf, Merchant Yang Dicari Tidak Ada</h3>
                    </div>
                </div>
            @endif
            @foreach($merchants as $merchant)
                <a href="/merchant-view/{{$merchant->merchant_username}}" style="text-decoration:none;color:black">
                    <div class="merchant-list-card" style="display:flex">
                        <div class="image-list">
                            <div class="profile-image">
                                <img src="{{asset('storage/fotoProfilMerchant/'.$merchant->image)}}" id="profileImage">
                            </div>
                        </div>
                        <div style="display:block;margin-left:10%">
                            <div class="merchant-name">
                                <h3>{{$merchant->merchant_name}}</h3>
                            </div>
                            <p>Expertize :</p>
                            <div class="exp">
                                <p>
                                    @foreach($merchant->exp as $expItem)   
                                    <div class="category">
                                        {{$expItem}}
                                    </div>
                                    
                                @endforeach
                                </p>
                            </div>
                        </div>
                    </div> 
                </a>
            @endforeach 
        </div>
    @endsection
</body>

<script>
    const card = document.querySelector('.merchant-list-card');
card.addEventListener('click', function() {
  card.style.transform = 'scale(0.1)';
  setTimeout(function() {
    card.style.transform = 'scale(1)';
  }, 300);
});
</script>
</html>
