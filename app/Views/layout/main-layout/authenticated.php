<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url('css/app.css'); ?>?v=<?php echo time(); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url('css/header.css'); ?>?v=<?php echo time(); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url('css/sidenav.css'); ?>?v=<?php echo time(); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url('css/main.css'); ?>?v=<?php echo time(); ?>" type="text/css" />
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">

    <!-- JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="icon" href="<?php echo base_url('images/HRMatrixLogo.png'); ?>" type="image/x-icon"/>

    <title>HRMatrix</title>
</head>

<body>

    <header class="header"> 

        <div class="d-flex align-items-center justify-content-between mx-4">

                <div class="d-flex align-items-center">
                     <img src="<?php echo base_url('images/HRMatrixLogo.png'); ?>" id="logo-img" alt="App Logo">
                     <span class="text-primary">HRMatrix</span>

                </div>

                <div class="far-right">
                    <span><?php echo session()->get('name'); ?></span>
                    <img src="<?php echo base_url('images/HRMatrixLogo.png'); ?>" alt="Avatar" class="avatar">
                </div>

        </div>

    </header>

    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">

      <?php

            // Get the full URI string
            $fullUri = uri_string();

            // Split the URI into parts
            $uriParts = explode('/', $fullUri);

            $page = $uriParts[0];

        ?>
        

        <a href="<?= base_url('/home')?>" class="list-group-item list-group-item-action py-2 ripple <?= (base_url('/home') === base_url($page)) ? 'active' : '' ?>">
          <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span>
        </a>
        <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
            class="fas fa-chart-line fa-fw me-3"></i><span>Analytics</span></a>
        <a href="<?= base_url('/request-forms')?>" class="list-group-item list-group-item-action py-2 ripple <?= (base_url('/request-forms') === base_url($page)) ? 'active' : '' ?>"><i
            class="fas fa-chart-bar fa-fw me-3"></i><span>Request Forms</span></a>
        <a href="<?= base_url('/departments')?>" class="list-group-item list-group-item-action py-2 ripple"><i
            class="fas fa-code-branch fa-fw me-3"></i><span>Department</span></a>
        <a href="<?= base_url('/users')?>" class="list-group-item list-group-item-action py-2 ripple <?= (base_url('/users') === base_url($page)) ? 'active' : '' ?>"><i
            class="fas fa-users fa-fw me-3"></i><span>Users</span></a>
        <a href="<?= base_url('/roles')?>" class="list-group-item list-group-item-action py-2 ripple"><i
            class="fas fa-user-tag fa-fw me-3"></i><span>Roles</span></a>
            <button type="button" onclick="logout()" href="#" class="list-group-item list-group-item-action py-2 ripple"><i
            class="fas fa-power-off fa-fw me-3"></i><span>Log out</span></button>
      </div>
    </div>
  </nav>

    <main class="main-content">


    <?= $this->renderSection('content') ?>

    </main>

<?php if (session()->getFlashdata('msg')): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            let msg = '<?= session()->getFlashdata('msg') ?>';
            let icon = '<?= session()->getFlashdata('icon') ?>';

            switch (icon) {
                case 'error':
                    Swal.fire({
                        title: 'Error',
                        text: msg,
                        icon: icon,
                        confirmButtonText: 'Okay'
                    });
                    break;
                case 'info':
                    Swal.fire({
                        title: 'Info',
                        text: msg,
                        icon: icon,
                        confirmButtonText: 'Okay'
                    });
                    break;
                case 'warning':
                    Swal.fire({
                        title: 'Warning',
                        text: msg,
                        icon: icon,
                        confirmButtonText: 'Okay'
                    });
                    break;
                case 'success':
                    Swal.fire({
                        title: 'Success',
                        text: msg,
                        icon: icon,
                        confirmButtonText: 'Okay'
                    });
                    break;
                default:
                    Swal.fire({
                        title: 'Warning',
                        text: msg,
                        icon: "info",
                        confirmButtonText: 'Okay'
                    });
            }


        });
    </script>
<?php endif; ?>

<!-- Bootstrap JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<!-- Sweet Alert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function logout() {
        Swal.fire({
            title: 'Logging Out',
            text: "Are you sure you want to logout?",
            icon: "warning",
            confirmButtonText: 'Yes, I want to logout.',
            showCancelButton: true,
            cancelButtonText: 'No',
        }).then((result) => {
    if (result.isConfirmed) {
            // Redirect to the logout URL or any other URL
            window.location.href = '/logout'; // Change this to your logout URL
        }
    });
    }
</script>
</body>

</html>
