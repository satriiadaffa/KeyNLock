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
    <button class="btn-back" onclick="window.history.back()">Kembali</button>  
    <div class="box-container">
      <h1 style="margin-bottom:20px">Update Data User</h1>
      <table>
          <form action="/merchant-account-settings-store" method="post" id="userSetting">
            @csrf
          <tr>
            <td>
              <div class="user-input-box">
              <div style="display:flex">
                <label for="userName">Username</label>
                <p style="font-size:10px;margin:6px 0px 0px 6px">(hanya bisa diganti setelah 1 bulan)</p>
              </div>
              
              <input type="text"
                     id="userName"
                     disabled
                     name="userName"
                     value="{{$data->userName}}">
            </div>
          </td>
            <td>
              <div class="user-input-box">
              <label for="fullName">Full Name</label><br>
              <input type="text"
                     id="fullName"
                     name="fullName"
                     value="{{$data->fullName}}">
                     @error('fullName')
                    <p class="p-error">{{$message}}</p>
                  @enderror
            </div>
          </td>  
          </tr>
          <tr>
            <td>
              <div class="user-input-box">
                <label for="phoneNumber">Phone Number</label><br>
                <div class="phoneinline" style="display: flex">
                <input type="text"
                       id="phoneNumber"
                       name="phoneNumber"
                       value="{{$data->phoneNumber}}">
                       @error('phoneNumber')
                    <p class="p-error">{{$message}}</p>
                  @enderror
                </div>
              </div>
            </td>
          </tr>
            <tr>
            </td>
              <td>
                <div class="user-input-box">
                <label for="email">Change Email</label><br>
                <input type="email"
                       id="email"
                       name="email"
                       value="{{$data->email}}">
                       @error('email')
                    <p class="p-error">{{$message}}</p>
                  @enderror
              </div>
            </td>  
            </tr>
            <tr>
              <td colspan="2">
                <div class="user-input-box">
                  <label for="actualAddress">Address</label><br>
                  <textarea name="actualAddress" id="actualAddress" form="userSetting">{{$address->actualAddress}}</textarea>
                  @error('actualAddress')
                  <p class="p-error">{{$message}}</p>
                @enderror
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">@if (session('success'))
              <div class="alert alert-success" role="alert">
                {{ session('success') }}
              </div>
              @endif</td>
          </tr>
      </table>
      <table class="buttons">
        <tr>
          <td>
            <input type="submit" class="btn btn-submit2" value="Update Profile">
          </td>
        </tr>
        
      </table>
      </form>
  </div>

    @endsection

</body>
</html>