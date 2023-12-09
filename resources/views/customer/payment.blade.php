<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/settingpage.css" />
    <link rel="stylesheet" href="css/login&regisImages.css" />
    <link rel="stylesheet" href="css/pages.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    @extends('customer.custSidebar')
    <title>{{$title}}</title>
</head>
<body>
    @section('content')

      <table>
          <tr>
            <td>
              <div class="text">
                <a style="font-size: 30px">Order Summary</a><br>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <br>
              <div class="image">
                <a>
                  <img src="images/profileIcon.png" alt="" style="width:100px;height:100px; background-color:#FFFFFF"></a>
                  <a style="font-size: 15px;">Susilo Bambang</a><br>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="image">
                <a><img src="images/lock.png" alt="" style="width:100px;height:100px; background-color:#FFFFFF"></a>
                <a style="font-size: 15px; font-weight: bold">Jenis Jasa: </a><a style="font-size: 15px;">Kunci Motor</a>
                <br>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="image">
                <a><img src="images/location.png" alt="" style="width:80px;height:100px; background-color:#FFFFFF"></a>
                <a style="font-size: 15px; font-weight: bold">Alamat: </a><a style="font-size: 15px;">Jl. Heven no. 1 Blok A</a>
                <br>
              </div>
            </td>
          </tr>
        </table>
        <hr>

        <table>
          <tr>
            <td>
              <div class="text">
                <a style="font-size: 30px">Payment Details</a>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="text">
                <a style="font-size: 15px">Jasa</a>
              </div>
            </td>
            <td>
              <div class="text" style="text-align: right">
                <a style="font-size: 15px">Rp65.000</a>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="text">
                <a style="font-size: 15px">Biaya Admin</a>
              </div>
            </td>
            <td>
              <div class="text" style="text-align: right">
                <a style="font-size: 15px">Rp4.000</a>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="text">
                <a style="font-size: 15px">Total</a>
              </div>
            </td>
            <td>
              <div class="text" style="text-align: right">
                <a style="font-size: 15px">Rp69.000</a>
              </div>
            </td>
          </tr>
          <tr>
            <td>
            </td>
            <td>
              <div class="button" style="text-align: right">
                <button type="button" class="btn btn-primary">Bayar Rp69.000</button>
              </div>
            </td>
          </tr>
        </table>

    @endsection
</body>
</html>
