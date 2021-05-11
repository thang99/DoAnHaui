<!DOCTYPE html>
<html lang="en" class="no-ie">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
   <title>Admin Theme</title>
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
   <link rel="stylesheet" href="{{asset('fontawesome-free-5.15.3-web/css/all.min.css')}}">
   <style>
      body {
         background-color: rgb(203, 212, 150);
      }
      #app{
         position: absolute;
         top: 50%;
         left: 50%;
         transform: translate(-50%,-50%);
         width: 400px;
         border: 1px solid rgb(218, 215, 215);
         border-radius: 10px;
         padding: 30px;
         background-color: rgb(206, 161, 161);
      }
      .form-login {
         position: relative;
      }
      .fa-envelope {
         position: absolute;
         top:10px;
         left: 10px;
      }
      .fa-lock {
         position: absolute;
         top: 65px;
         left: 10px;
      }
      img {
         position: absolute;
         top: -50px;
         left: 150px;
         border: none;
         border-radius: 50%; 
      }
      .alert {
         position: absolute;
         top:-150px;
         left:100px;
      }
   </style>
</head>
<body>
   <div id="app">
         @if (session('status'))
            <div class="alert alert-primary">
               {{ session('status') }}
            </div>
         @endif
         <div>
            <div>
               <a href="#">
                  <img src="{{ asset('images/logo.jpg') }}" alt="Image" class="block-center img-rounded" width="90" height="90">
               </a>
               <p class="text-center mt-lg">
                  <h5 class="text-center mb-5">Đăng nhập</h5>
               </p>
            </div>
            <div>
               <form class="form-login" action="{{ route('admin.login')}}" method="POST">
                  @csrf     
                  <div class="form-group">
                     <input id="exampleInputEmail1" type="email" placeholder="Email" style="padding-left:40px" class="form-control" name="email" value="{{ old('email')}}">
                     <span class="fa fa-envelope form-control-feedback text-muted"></span>
                     @error('email')
                        <p class="text-danger">{{ $message }}</p>
                     @enderror
                  </div>
                  <div class="form-group">
                     <input id="exampleInputPassword1" type="password" placeholder="Password" style="padding-left:40px" class="form-control" name="password">
                     <span class="fa fa-lock form-control-feedback text-muted"></span>
                     @error('password')
                        <p class="text-danger">{{ $message }}</p>
                     @enderror
                  </div>
                  <button type="submit" class="btn btn-block btn-success mt-5">Đăng nhập</button>
               </form>
            </div>
         </div>
   </div>
</body>
</html>