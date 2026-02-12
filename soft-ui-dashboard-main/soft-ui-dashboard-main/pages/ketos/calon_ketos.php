<?php
include "../header/header.php";
include "../header/config.php";

$halaman_aktif = basename($_SERVER['PHP_SELF']);

// $halaman_aktif = calon_ketos.php
// $_SERVER['PHP_SELF'] = variable bawaan PHP yang berisikan alamat file yang sudah dibuka 
// basename() = adalah fungsi PHP untuk mengambil file saja dari sebuah path
// ambil alamat file sekarang -> ambil nama filenya saja
?>

<style>
  .btn_tambah:hover {
    transition: all 0.3s ease;
  }
  
  .btn_tambah:hover {
    background-color: #0b5ed7;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(13, 110, 253, 0.4);
  }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">



    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
           
            <div class="card-header pb-0">
                <a href="tambah_calonketos.php" type="button"  class="btn btn_tambah btn-primary btn-lg">TAMBAH CALON KETUA OSIS</a>
              <h6>Daftar calon ketua osis</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NO</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NAMA</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">VISI</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">MISI</th>
                      
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>

                   <tr>



                  <?php
                  $no= 1;
                  $query = mysqli_query($koneksi ,"select* from tbl_calon");
                  foreach($query as $key) : 
                  ?>

                   <td>

                  <div class="d-flex px-2 py-1">
                    <?=$no++?>
                  </div>
                         <!-- <div>
                           <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                        </div> -->

                      </td>
                      
                      <td> 
                        <div class="d-flex px-2 py-1">
                      <div>
                       <img src="../../assets/img/<?= $key['foto'] ?>" class="avatar avatar-sm me-3" alt="user1">
                     </div>
                          <div class="d-flex flex-column justify-content-center">
                          <h4 class="text-xs font-weight-bold mb-0"><?= $key['nama_calon']?></h4>
                          <p class="text-xs text-secondary mb-0">predikat</p>
                        </div>
                        </div>
                      </td>

                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?= $key['visi']?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= $key['misi']?></span>
                      </td>
                       
                     <td class="align-middle">
                        <a href="edit_ketos.php?id=<?= $key['id_calon'] ?>"
                        class="text-warning font-weight-bold text-xs"
                        data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a>
                      </td>
                      <td class="align-middle">
                        <a href="#"
                        class="text-secondary text-xs font-weight-bold text-danger"
                        onclick="hapusCalon(<?= $key['id_calon'] ?>)"
                        data-toggle="tooltip"
                        data-original-title="Edit user">
                        <i class="fa-solid fa-trash fs-"></i>|delete
                      </a>
                      </td>
                    </tr>
                    
               <?php endforeach?>
               
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
            ©
            made with IT XPRO
            
            for a better web.
          </div>
            </div>
            <div class="col-lg-6">
              
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg ">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn btn-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn btn-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3">
          <h6 class="mb-0">Navbar Fixed</h6>
        </div>
        <div class="form-check form-switch ps-0">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
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
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>

  <script>
  function hapusCalon(id_calon) {
    Swal.fire({
      title: "Do you want to delete this file?",
      text: "your data will deleted permanen",
      showDenyButton: true,
      // showCancelButton: true,
      confirmButtonText: "delete",
      cancelbuttontext: "cancel",
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'delete_ketos.php?id=' + id_calon;
        Swal.fire("Your file deleted!", "", "success");
      } else if (result.isDenied) {
        Swal.fire("cancel deleted", "", "info");
      }
    });
  }
</script>

</body>

</html>