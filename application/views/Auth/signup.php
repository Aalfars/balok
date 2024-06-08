<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php require_once('conn.php'); ?>
</head>

<body class="g-sidenav-show  bg-gray-100">

  <section class="min-vh-100 mb-8">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url(<?= base_url('assets/assets/img/curved-images/curved14.jpg') ?>);">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Welcome!</h1>
            <p class="text-lead text-white">Selamat datang di web ini . daftar untuk bisa menikmati fitur lebih seperti upload dan manajemen konten</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <?php echo $this->session->flashdata('alert', true); ?>

            <div class="card-body">
              <form role="form text-left" method="post" action="<?= base_url('Auth/process_signup') ?>" onsubmit="return validateForm()">
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Nama" aria-label="Name" name="nama" aria-describedby="email-addon">
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Username" aria-label="Name" name="username" aria-describedby="email-addon">
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control" placeholder="password" aria-label="Password" name="password" aria-describedby="email-addon">
                </div>
                <div class="form-check form-check-info text-left">
                  <input class="form-check-input" type="checkbox" value="" id="agreeCheckbox">
                  <label class="form-check-label" for="flexCheckDefault">
                    I agree the <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#peraturan" class="text-dark font-weight-bolder">Terms and Conditions</a>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2" id="SignupButton" disabled>Sign up</button>
                </div>
                <p class="text-sm mt-3 mb-0">Already have an account? <a href="<?= base_url('auth') ?>" class="text-dark font-weight-bolder">Sign in</a></p>
              </form>
              <script>
                function validateForm() {
                  var agreeCheckbox = document.getElementById("agreeCheckbox");
                  var signupButton = document.getElementById("signupButton");

                  if (agreeCheckbox.checked) {
                    return true; // Formulir akan disubmit
                  } else {
                    alert("Anda harus menyetujui syarat dan ketentuan.");
                    return false; // Formulir tidak akan disubmit
                  }
                }

                // Mengaktifkan/menonaktifkan tombol berdasarkan status checkbox
                document.getElementById("agreeCheckbox").addEventListener("change", function() {
                  var signupButton = document.getElementById("SignupButton");
                  signupButton.disabled = !this.checked;
                });
              </script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row">

        <div class="col-lg-8 mx-auto text-center mb-4 mt-2">

          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-twitter"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
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
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="<?= base_url('assets') ?>/assets/js/core/popper.min.js"></script>
  <script src="<?= base_url('assets') ?>/assets/js/core/bootstrap.min.js"></script>
  <script src="<?= base_url('assets') ?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?= base_url('assets') ?>/assets/js/plugins/smooth-scrollbar.min.js"></script>
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
  <script async="" defer="" src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?=base_url('assets')?>/assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
  <div class="modal " id="peraturan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Term and Conditions</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color:black;"><i class="ni ni-fat-remove"></i></button>
                      </div>
                      <div class="modal-body">
                        <ol>
                          <li>
                            <strong>Berkomentar dengan Hormat:</strong>
                            <p>Harap berkomunikasi dengan sopan dan hormat terhadap anggota lain. Jangan gunakan bahasa kasar atau menghina.</p>
                          </li>

                          <li>
                            <strong>Tidak Ada Konten Ilegal atau Merugikan:</strong>
                            <p>Dilarang mengunggah, membagikan, atau mempromosikan konten ilegal, merugikan, atau melanggar hak cipta.</p>
                          </li>
                          <li>
                            <strong>Bahasa yang Dapat Dimengerti: </strong>
                            <p>Gunakan bahasa yang mudah dimengerti dan jelas. Hindari penggunaan singkatan atau slang yang sulit dipahami.</p>
                          </li>
                          <li>
                            <strong>Hak Cipta:</strong>
                            <p>Pastikan untuk mematuhi hak cipta dan tidak mengunggah konten yang melanggar hak cipta tanpa izin.</p>
                          </li>
                          <li>
                            <strong>Sanksi Pelanggaran:</strong>
                            <p>Administrator berhak memberlakukan sanksi, termasuk pembekuan akun, jika peraturan forum dilanggar secara berulang atau parah.</p>
                          </li>
                      </div>
                    </div>
                  </div>
                </div>



</body>

</html>