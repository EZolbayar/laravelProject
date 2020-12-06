<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{config('blog.title')}} - Удирдлагын хэсэг</title>
  <link href="/admin-assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/admin-assets/vendor/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/admin-assets/css/style.css">
  <style>
    input {
      padding: 5px 10px;
      background: rgba(0,0,0,0.1);
      margin-bottom: 15px;
      width: 100%;
    }

    input::focus {
      border: 2px solid rgba(0,0,0,0.5);
    }

    .btn-login {
      border:0;
      color:#000;
      background: #fff;
      border: 1px solid #000;
      border-radius: 0;
    }

    p.alert {
      border-radius: 0;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-offset-4 col-md-4 login-row">
        <form method="post" action="/auth/login">
          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
          <div class="panel-body pn mv10">
            <div class="section">
              <div class="form-group">
                @foreach($errors->all() as $error)
                <p class="alert alert-danger">{!!$error!!}</p>
                @endforeach
                @if(Session::has('message'))
                <p class="alert alert-success">{{Session::get('message')}}</p>
                @endif
              </div>
            </div>

            <div class="form-group">
              <input type="text" name="email" id="email" class="gui-input"
              placeholder="И-мэйл">
            </div>

            <div class="form-group">
              <input type="password" name="password" id="password" class="gui-input"
              placeholder="Нууц үг">
            </div>

            <div class="section">
              <button type="submit" class="btn btn-login pull-right">Нэвтрэх</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="text-center">
        Sodon &copy; 2020
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="/admin-assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>