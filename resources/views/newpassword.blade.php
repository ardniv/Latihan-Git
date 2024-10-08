<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Password Update</h2>
                        <form action="{{ route('password.update')}}" method="POST" class="register-form" id="newpass-form">
                        @csrf
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <label for="password1"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password1" id="password1" placeholder="Confirm Password" required/>
                            </div>
                            <div class="form-group">
                                <label><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="hidden" name="email" value="{{request()->email}}"/>
                            </div>
                            <div class="form-group">
                                <label><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="hidden" name="token" value="{{request()->token}}"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="confirm" id="confirm" class="form-submit" value="Confirm"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{ asset('images/signup-image.jpg')}}" alt="sing up image"></figure>
                        <!-- <a href="{{route('login')}}" class="signup-image-link">I am already member</a> -->
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/main.js')}}"></script>
    
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if($message = Session::get('success'))
<script>
    Swal.fire({
    position: "center",
    icon: "success",
    title: "{{$message}}",
    showConfirmButton: false,
    timer: 1500
    });
</script>
@endif

@if($message = Session::get('error'))
<script>
    Swal.fire({
    position: "center",
    icon: "error",
    title: "{{$message}}",
    showConfirmButton: false,
    timer: 1500
    });
@endif
</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>