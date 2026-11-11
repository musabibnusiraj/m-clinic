<?php
require_once __DIR__ . '/../../config.php';
?>


<!doctype html>
<html
  lang="en"
  class="layout-wide customizer-hide">

<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>M Clinic</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="<?= asset('assets/vendor/css/core.css'); ?>" />
  <link rel="stylesheet" href="<?= asset('assets/vendor/css/pages/page-auth.css'); ?>" />
  <style>
    .app-brand-logo {
      width: 100px;
      margin-right: 10px;
    }
  </style>
</head>

<body>
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <div class="card px-sm-6 px-0">
          <div class="card-body">
            <div class="app-brand justify-content-center">
              <img src="<?= asset('assets/imgs/logo.png'); ?>" alt="M Clinic Tooth Care" class="app-brand-logo">

              <span class="app-brand-text text-heading fw-bold">M Clinic</span>
            </div>
            <h4 class="mb-1">Welcome to M Clinic</h4>
            <p class="mb-6">Sign in to your account</p>

            <form id="formAuthentication" class="mb-6">
              <div class="mb-6">
                <label for="email" class="form-label">Email or Username</label>
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="email-username"
                  placeholder="Enter your email or username"
                  autofocus />
              </div>
              <div class="mb-6">
                <label class="form-label" for="password">Password</label>
                <input
                  type="password"
                  id="password"
                  class="form-control"
                  name="password"
                  placeholder="Enter your password" />
              </div>
              <div class="mb-8">
                <div class="d-flex justify-content-between">
                  <div class="form-check mb-0">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                </div>
              </div>
              <div class="mb-6">
                <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>