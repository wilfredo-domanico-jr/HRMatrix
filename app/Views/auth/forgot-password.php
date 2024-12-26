
<?= $this->extend('layout/main-layout/guest') ?>

 
<?= $this->section('content') ?>

<div class="container full-height d-flex justify-content-center align-items-center">


    <div class="d-flex flex-column align-items-center justify-content-center w-100 h-50">

        <div class="p-4 w-50 h-50 text-center">
            <h1 class="fw-bold text-white">HRMatrix</h1>
            <h3>Building a Culture of Excellence</h3>

        </div>

        <div class="m-4 p-2 bg-white rounded h-100 text-center animate__animated animate__animated animate__backInUp" style="width: 30%;">

            <form action="<?= base_url('forgot-password/submit') ?>" method="post" class="p-4">

            
              

                <img src="<?php echo base_url('images/HRMatrixLogo.png'); ?>" class="img-fluid" style="height:8rem;" alt="HR Matrix Logo">

                <div class="mb-4 text-secondary">
                    Please enter your email address and we will send you a password reset link.
                </div>
                

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                </div>

                <button type="submit" class="btn btn-primary w-100 mb-3">Send Password Reset Link</button>

                <a href="/" class="nav-link text-secondary">Back to Login</a>
            </form>


        </div>
    </div>


</div>


<?= $this->endSection() ?>
