<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('/assets/client/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/client/css/cart.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/client/css/dropdown.css')}}">

    <link rel="stylesheet" href="./assets/Css/dropdown.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0"
        nonce="vWDw95v7"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    @yield('css')
</head>

<body>
    <div id="fb-root"></div>
    <div class="container">

        @include('client.layout.header')
        <!-- Content -->
        @yield('content')

        @include('client.layout.footer')

        <div class="list-contact-icon-box">
            <ul class="list-contact-icon">
                <li class="bg-phone"><i class="fa-solid fa-phone"></i></li>
                <li class="bg-facebook"><i class="fa-brands fa-facebook-f"></i></li>
                <li class="bg-youtobe"><i class="fa-brands fa-youtube"></i></li>
                <li class="bg-twiter"><i class="fa-brands fa-twitter"></i></li>
            </ul>
        </div>
    </div>
    <div id="backTop">
        <i class="fa-solid fa-caret-up"></i>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    @yield('script')
    <script src="{{asset('./assets/client/js/list-cart.js')}}"></script>
    <script src="{{asset('./assets/client/js/click-dropdown.js')}}"></script>
    <script src="{{asset('./assets/client/js/back-top.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    $(function() {
        <?php if (session()->exists('error')) { ?>

        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: '<?= session('error') ?>',
            timer: 3000,

        })

        <?php
        session()->forget('error');
    } elseif (session()->exists('success')) { ?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?= session('success') ?>',
            showConfirmButton: false,
            timer: 1500

        })

        <?php session()->forget('success');
    }
    
    ?>

    });
    </script>
</body>

</html>