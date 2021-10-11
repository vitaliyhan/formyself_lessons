<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Registration Page</title>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">


    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/admin/css/admin.css') }}">
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">

    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Регистрация</p>
            <container>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </container>
            <form action="{{ route('register.store') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Имя" value="{{  old('name') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email"
                           value="{{  old('email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Пароль">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="Повторить пароль">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">

                    <!-- /.col -->
                    <div class="col-8">
                        <button type="submit" class="btn btn-primary btn-block">Зарегистироваться</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            <a href="{{ route('login.create') }}" class="text-center">Уже зарегистрированы?</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('public/assets/admin/js/admin.js') }}"></script>
</body>
</html>
