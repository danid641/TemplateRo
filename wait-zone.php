<?php
require_once("inc/banned_ip_russia.php");

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>wait-zone</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="icon" type="image/png" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>/assets/img/logo/icon.png">
  <script>
  var countDownDate = new Date("12.01.2022").getTime();
  </script>
  <style>
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css");

    body {
      font-family: 'Karla', sans-serif;
      background-image: url("https://visme.co/blog/wp-content/uploads/2017/07/50-Beautiful-and-Minimalist-Presentation-Backgrounds-02.jpg");
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      color: #ffffff;
      padding-bottom: 75px;
    }

    @media (min-width: 768px) {
      body {
        padding-bottom: 110px;
      }
    }

    .navbar-brand {
      margin-right: 0;
    }

    .navbar-brand img {
      height: 21px;
    }

    .navbar-dark {
      padding-top: 35px;
      padding-bottom: 35px;
    }

    .navbar-dark .navbar-text {
      color: #ffffff;
      opacity: 1;
      padding: 0 20px;
      border-right: 1px solid #ffffff;
      font-size: 18px;
      font-weight: bold;
      text-align: center;
    }

    .navbar-dark .navbar-text:last-child {
      border-right: 0;
    }

    @media (max-width: 767px) {
      .navbar-dark {
        padding-bottom: 0;
      }
    }

    .page-title {
      font-size: 80px;
      font-weight: bold;
      margin-bottom: 6px;
    }

    @media (max-width: 767px) {
      .page-title {
        font-size: 35px;
        margin-bottom: 14px;
      }
    }

    .page-description {
      max-width: 465px;
      font-size: 18px;
      margin-bottom: 59px;
    }

    @media (max-width: 767px) {
      .page-description {
        font-size: 14px;
      }
    }

    p {
      font-size: 14px;
      margin-bottom: 21px;
    }

    .footer-social-links .social-link {
      display: inline-block;
      text-align: center;
      line-height: 40px;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: #ffffff;
      color: #000000;
      margin-right: 16px;
      transition: all 0.3s ease-in-out;
    }

    .footer-social-links .social-link:last-child {
      margin-right: 0;
    }

    .footer-social-links .social-link:hover {
      text-decoration: none;
      background-color: #000000;
      color: #ffffff;
    }

    /*# sourceMappingURL=bd-coming-soon.css.map */
  </style>
</head>

<body class="min-vh-100 d-flex flex-column">
  <header>
    <div class="container">
      <nav class="navbar navbar-dark bg-transparenet">
        <a class="navbar-brand" href="wait-zone">
          <span style="position:fixed; font-size: 30px; color: #911;">
            TemplateRo
          </span>
        </a>
        <span class="navbar-text ml-auto d-none d-sm-inline-block"></span>
        <span class="navbar-text d-none d-sm-inline-block"></span>
      </nav>
    </div>
  </header>
  <main class="my-auto">
    <div class="container">
      <center>
        <h1 class="page-title">We're coming soon</h1>
        <p class="page-description" style="font-size:50px;" id="demo"></p>
      </center>

      <p>Stay connected</p>
      <nav class="footer-social-links">
        <a href="https://github.com/danid641" class="social-link"><i class="mdi mdi-github-box"></i></a>
        <a href="#!" class="social-link"><i class="mdi mdi-twitter"></i></a>
        <a href="#!" class="social-link"><i class="mdi mdi-google"></i></a>
        <a href="#!" class="social-link"><i class="mdi mdi-slack"></i></a>
        <a href="#!" class="social-link"><i class="mdi mdi-skype"></i></a>
      </nav>
    </div>
  </main>

  <script src="assets/js/timer.js"></script>
  <script type="text/javascript">

  </script>
</body>

</html>