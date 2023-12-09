<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/accesories.css">
    <link rel="stylesheet" href="CSS/login&regisImage.css"> 
    <title>{{$title}}</title>
</head>
<body id="register">
<div class="container">
  <table>
    <tr>
      <th></th>
      <th><a href="/login" class="already">already a member? Login here</a></th>
    </tr>
    <tr>
      
        <td style="width: 50%; margin:auto"><h1 class="form-title">Input User Information</h1></td>
        <td><span class="logo-name"><img src="{{asset('images/keynlock-logo.png')}}" alt="Logo" style="width:80%"></span></td>
      
    </tr>
    <tr>
      <td colspan="2">
        <p class="form-para">We need you to help us with some basic information for your account creation. Here are our
        <a href="#">terms and conditions</a>.
        Please read them carefully. We are GDRP compliant</p>
      </td>
    </tr>
    <form action="/register" method="post">
      @csrf 
    <tr>
      <td><div class="user-input-box">
        <label for="fullName">Full Name</label><br>
        <input type="text"
               class="form-control @error('fullName') is-invalid @enderror"
               id="fullName"
               name="fullName"
               value="{{old('fullName')}}"
               placeholder="Input your first name">
        @error('fullName')
          <p class="p-error">{{$message}}</p>
        @enderror
      </div>
    </td>
      <td><div class="user-input-box">
        <label for="userName">User Name</label><br>
        <input type="text"
               class="form-control @error('userName') is-invalid @enderror"
               id="userName"
               name="userName"
               value="{{old('userName')}}"
               placeholder="Input your User name">
        @error('userName')
          <p class="p-error">{{$message}}</p>
        @enderror
      </div>
    </td>  
    </tr>
    <tr>
      <td>
        <div class="user-input-box">
          <label for="email">E-Mail</label><br>
          <input type="email"
                 class="form-control @error('email') is-invalid @enderror"
                 id="email"
                 name="email"
                 value="{{old('email')}}"
                 placeholder="Input your e-mail">
          @error('email')
          <p class="p-error">{{$message}}</p>
          @enderror
        </div>
      </td>
      <td>

        <div class="user-input-box">
          <label for="phoneNumber">Phone Number</label><br>
          <div class="phoneinline" style="display: flex">
          <input type="text" style="width:13%; text-align:center;border:0px"value="+62" disabled>
          <input type="text"
                 class="form-control @error('phoneNumber') is-invalid @enderror"
                 id="phoneNumber"
                 name="phoneNumber"
                 value="{{old('phoneNumber')}}"
                 maxlength="14"
                 placeholder="Can we call you?">
          </div>
        @error('phoneNumber')
          <p class="p-error">{{$message}}</p>
        @enderror
        </div>
      </td>
      <tr>
        <td style="padding-right:10px;">
          <label>Select Role</label>

          <div class="form-control @error('role') is-invalid @enderror" style="padding-top:15px;display:block;height:50px;border-radius: 2px;">
          <span>
            <input type="radio" name="role" value="customer" id="customer" style="cursor: pointer"{{ old('role') == 'customer' ? 'checked' : '' }}>
          <label for="customer" style="cursor: pointer">Customer</label>
          </span>

          <span style="cursor: pointer">
            <input type="radio" name="role" value="merchant" id="merchant" style="cursor: pointer"{{ old('role') == 'merchant' ? 'checked' : '' }}>
          <label for="merchant" style="cursor: pointer">Merchant</label>
          </span>
          </div>
          @error('role')
          <p class="p-error">{{$message}}</p>
        @enderror

      </td>
    </tr>
    <tr>
      <td>
        <div class="user-input-box">
          <label for="password">Password</label><br>
          <input type="password"
                 class="form-control @error('password') is-invalid @enderror"
                 id="password"
                 name="password"
                 placeholder="Remember, no system is safe">
          @error('password')
          <p class="p-error">{{$message}}</p>
        @enderror
        </div>
      </td>
      <td>
        <div class="user-input-box">
          <label for="confirmPassword">Confirm Password</label><br>
          <input type="password"
                 class="form-control @error('confirmPassword') is-invalid @enderror"
                 id="confirmPassword"
                 name="confirmPassword"
                 placeholder="Make sure you remember">
        @error('confirmPassword')
          <p class="p-error">{{$message}}</p>
        @enderror
        </div>
      </td>
    </tr>
  </table>

  <hr>

  <table>
    <tr>
      <td>
          <input type="checkbox" id="i_agree" name="i_agree" required>
            <label for="i_agree">I agree with <a href="#">Terms and Conditions</a></label>
      </td>
      <td>
        <div class="user-input-box-submit">
          <input class="btn btn-submit2" type="submit" value="Register">
        </div>
      </td>
    </tr>
  </form>
  </table>
</div>

<script>
  // Mendapatkan elemen input nomor telepon
  var phoneInput = document.getElementById("phoneNumber");

  // Menambahkan event listener untuk setiap perubahan pada input
  phoneInput.addEventListener("input", function(event) {
      // Menghapus tanda strip yang sudah ada sebelumnya
      var cleaned = phoneInput.value.replace(/-/g, "");

      // Memeriksa apakah panjang nomor telepon sudah mencukupi untuk menambahkan tanda strip
      if (cleaned.length > 4) {
          // Menambahkan tanda strip setelah empat digit pertama
          cleaned = cleaned.slice(0, 4) + "-" + cleaned.slice(4);
          
          // Jika panjang nomor telepon lebih dari 8 digit (termasuk tiga strip yang telah ditambahkan), tambahkan strip lagi setelah empat digit berikutnya
          if (cleaned.length > 8) {
              cleaned = cleaned.slice(0, 8) + "-" + cleaned.slice(8);
          }
      }
    
      // Mengisi kembali nilai pada input dengan nomor telepon yang sudah ditambahkan tanda strip
      phoneInput.value = cleaned;
  });
</script>
</body>
</html>

