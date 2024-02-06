<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Yayasan Pendidikan Islamiyah</title>
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('themify-icons/themify-icons.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo-islamiyah.png') }}">
    <style>
      #loader {
        transition: all 0.3s ease-in-out;
        opacity: 1;
        visibility: visible;
        position: fixed;
        height: 100vh;
        width: 100%;
        background: #fff;
        z-index: 90000;
      }

      #loader.fadeOut {
        opacity: 0;
        visibility: hidden;
      }

      .spinner {
        width: 40px;
        height: 40px;
        position: absolute;
        top: calc(50% - 20px);
        left: calc(50% - 20px);
        background-color: #333;
        border-radius: 100%;
        -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
        animation: sk-scaleout 1.0s infinite ease-in-out;
      }

      @-webkit-keyframes sk-scaleout {
        0% { -webkit-transform: scale(0) }
        100% {
          -webkit-transform: scale(1.0);
          opacity: 0;
        }
      }

      @keyframes sk-scaleout {
        0% {
          -webkit-transform: scale(0);
          transform: scale(0);
        } 100% {
          -webkit-transform: scale(1.0);
          transform: scale(1.0);
          opacity: 0;
        }
      }
    </style>
  </head>
  <body class="app">
    <div id='loader'>
      <div class="spinner"></div>
    </div>

    <script>
      window.addEventListener('load', () => {
        const loader = document.getElementById('loader');
        setTimeout(() => {
          loader.classList.add('fadeOut');
        }, 300);
      });
    </script>
    <div class="peers ai-s fxw-nw h-100vh">
      <div class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv" style='background: url(/images/login-back3.jpg) no-repeat right top;background-size: cover;'>
        <div class="pos-a centerXY">
          <div class="pos-r" style='width: 150px; height: 150px;overflow: hidden;border-radius:15px;'>
            {{-- <img class="pos-a centerXY" src="/imgs/Pahtama.png" alt="" style="height: 100%;"> --}}
          </div>
        </div>
      </div>
      <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style='min-width: 320px;background-color: #999;'>
        <h4 class="fw-300 c-grey-900 mB-40">Login Admin</h4>
        <form action="{{ route('login') }}" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="text-normal text-dark">Email</label>
            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old("email") }}" placeholder="email@admin.com">
            @if($errors->has('email'))
            <small class="form-text text-danger">
              {{ $errors->first('email') }}
            </small>
            @endif
          </div>
          <div class="form-group">
            <label class="text-normal text-dark">Kata Sandi</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="peers ai-c jc-sb fxw-nw">
              <div class="peer">
                <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                  <input type="checkbox" id="inputCall1" name="remember_me" name="inputCheckboxesCall" class="peer">
                  <label for="inputCall1" class=" peers peer-greed js-sb ai-c">
                    <span class="peer peer-greed">Ingat Saya</span>
                  </label>
                </div>
              </div>
              <div class="peer">
                <button class="btn btn-primary" type="submit">Masuk</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
