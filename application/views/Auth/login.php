<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php
  require_once('conn.php');

  ?>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.1/dist/sweetalert2.all.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.1/dist/sweetalert2.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>


<body class="">
<?php if ($this->session->flashdata('alert')) : ?>
  <script>
    Swal.fire({
      icon: 'error',
      title: '<?= $this->session->flashdata('alert') ?>',
      showConfirmButton: false,
      timer: 1500
    });
  </script>
<?php endif; ?>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-6">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                  <p class="mb-0">Enter your username and password to sign in</p>
                </div>
                <div class="card-body">
                  <form role="form" method="post" action="<?= site_url('Auth/process_login') ?>">
                    <label>Username</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" placeholder="Username" name="username" aria-label="Username" aria-describedby="email-addon">
                    </div>
                    <label>Password</label>
                    <div class="mb-3">
                      <input type="password" class="form-control" placeholder="Password" name="pass" aria-label="Password" aria-describedby="password-addon">
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                    </div>
                  </form>
                </div>

              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('<?= base_url('assets/assets/img/curved-images/curved6.jpg') ?>"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row">

        <div class="col-lg-8 mx-auto text-center mb-4 mt-2">

          <a href="https://twitter.com/ArufaIsStraight" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-twitter"></span>
          </a>
          <a href="https://instagram.com/aalfars_" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-instagram"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-discord"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-github"></span>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script> Arufaa
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->

</body>

</html>