<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Armagedon</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
        <!-- Bootstrap core CSS -->
        <link href="{{ asset('front/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Custom fonts for this template -->
        <link href="{{ asset('front/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>
        <!-- Custom styles for this template -->
        <link href="{{ asset('front/css/grayscale.min.css') }}" rel="stylesheet">
        <link href="{{ asset('front/css/pages.css') }}" rel="stylesheet">
    </head>
    <body id="page-top">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Armagedon</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#download">Download</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Intro Header -->
        <header class="masthead">
            <div class="intro-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <h1 class="brand-heading">Armagedon</h1>
                            {{-- <p class="intro-text">A free, responsive, one page Bootstrap theme.
                                <br>Created by Start Bootstrap.
                            </p> --}}
                            <a href="#about" class="btn btn-circle js-scroll-trigger">
                            <i class="fa fa-angle-double-down animated"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- About Section -->
        <section id="about" class="content-section text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h2>About Armagedon</h2>
                        <p>This application developed by Armagedon SA allows you to monitor your computer or server stats like CPU, RAM or Network easly before you are logged and validated.</p>
                        <p>Also this aplication allows you to know historic average of computer/server rendiment.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Download Section -->
        <section id="download" class="download-section content-section text-center">
            <div class="container">
                <div class="col-lg-8 mx-auto">
                    <h2>Download</h2>
                    <p>You can download Armagedon in the following link.</p>
                    <a href="https://github.com/cristianfonolla/armagedonfrontend" class="btn btn-default btn-lg" target="_blank">Visit Download Page</a>
                </div>
            </div>
        </section>
        <!-- Contact Section -->
        <section id="contact" class="content-section text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h2>Contact us</h2>
                        <p>Feel free to contact us for any problem or leave a comment to give some feedback!
                        </p>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="media-container-column col-lg-8" data-form-type="formoid">
                                    <form id="contact-form" action="{{ action('Front\FrontController@contactForm') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control required" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control required" name="email">
                                        </div>
                                        <div class="form-group" data-for="message">
                                            <label>Message</label>
                                            <textarea type="text" class="form-control" name="message" rows="7"></textarea>
                                        </div>
                                        <span class="input-group-btn">
                                        <button id="send" class="btn btn-default btn-lg">SEND</button>
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- 
                          <ul class="list-inline banner-social-buttons">
                              <li class="list-inline-item">
                                  <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg">
                                  <i class="fa fa-twitter fa-fw"></i>
                                  <span class="network-name">Twitter</span>
                                  </a>
                              </li>
                              <li class="list-inline-item">
                                  <a href="https://github.com/BlackrockDigital/startbootstrap" class="btn btn-default btn-lg">
                                  <i class="fa fa-github fa-fw"></i>
                                  <span class="network-name">Github</span>
                                  </a>
                              </li>
                              <li class="list-inline-item">
                                  <a href="https://plus.google.com/+Startbootstrap/posts" class="btn btn-default btn-lg">
                                  <i class="fa fa-google-plus fa-fw"></i>
                                  <span class="network-name">Google+</span>
                                  </a>
                              </li>
                          </ul>
                        --}}
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer -->
        <footer>
            <div class="container text-center">
                <p>Copyright Armagedon SA 2018</p>
            </div>
        </footer>
        <!-- Bootstrap core JavaScript -->
        <script src="{{ asset('front/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Plugin JavaScript -->
        <script src="{{ asset('front/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <!-- Custom scripts for this template -->
        <script src="{{ asset('front/js/grayscale.min.js') }}"></script>

        <script type="text/javascript">
            $(document).on('click', '#send', function(e) {
                e.preventDefault();
                $('.required').each(function() {
                    if($( this ).val() == ''){
                        $( this ).parent().addClass('has-danger');
                    }else{
                        $( this ).parent().removeClass('has-danger');
                    }
                });
                if($('.has-danger').length == 0){
                    $('#contact-form').submit();
                }
            })
        </script>
    </body>
</html>