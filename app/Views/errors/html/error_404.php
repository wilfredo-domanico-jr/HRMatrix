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
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="icon" href="<?php echo base_url('images/HRMatrixLogo.png'); ?>" type="image/x-icon" />

    <title><?= lang('Errors.pageNotFound') ?></title>
</head>


<body class="unathenticated-body">


 

<div class="container full-height d-flex justify-content-center align-items-center">


    <div class="d-flex align-items-center justify-content-center w-100 h-75">

       

        <div class="m-4 p-2 h-100 w-100 text-center d-flex flex-column justify-content-center align-items-center">
                <div class="rounded-circle bg-white mb-4">
                    <img src="<?php echo base_url('images/HRMatrixLogo.png'); ?>" class="img-fluid" style="height:15rem;" alt="HR Matrix Logo">
                </div>
                
                <h1 class="text-white mb-4">404 ( Not Found )</h1>
                <p class="h4 bg-white p-4 rounded w-75">
                <?php if (ENVIRONMENT !== 'production') : ?>
                <?= nl2br(esc($message)) ?>
                    <?php else : ?>
                        <?= lang('Errors.sorryCannotFind') ?>
                    <?php endif; ?>
                </p>

        </div>


    </div>


</div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>