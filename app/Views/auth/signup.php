

<?= $this->extend('layout/main-layout/guest') ?>

 
<?= $this->section('content') ?>

<div class="container full-height d-flex justify-content-center align-items-center">


    <div class="d-flex align-items-center justify-content-center w-100 h-50">

        <div class="p-4 w-50 h-50">
            <h1 class="fw-bold text-white animate__animated animate__backInLeft">HRMatrix</h1>
            <h3 class="animate__animated animate__backInUp">Building a Culture of Excellence</h3>

        </div>

        <div class="m-4 p-2 bg-white rounded h-100 text-center animate__animated animate__backInRight" style="width: 80%;">

            <form action="<?php echo base_url(); ?>SignupController/store" method="post" class="p-4">

                <img src="<?php echo base_url('images/HRMatrixLogo.png'); ?>" class="img-fluid" style="height:8rem;" alt="HR Matrix Logo">


                <div class="row">
                    <div class="col-6">

                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                            <input type="text" name="name" class="form-control" value="<?= set_value('name') ?>" placeholder="Enter Name">
                        </div>

                    </div>

                    <div class="col-6">

                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control">
                        </div>

                    </div>

                    <div class="col-6">

                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                            <input type="password" name="password" placeholder="Password" class="form-control">
                        </div>

                    </div>

                    <div class="col-6">

                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-unlock"></i></span>
                            <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control">
                        </div>

                    </div>
                </div>


                <button type="submit" class="btn btn-primary w-100 mb-3">Create Account</button>


                <hr>

                <a href="/" class="btn btn-dark w-100">Already Have an account?</a>
            </form>


        </div>
    </div>


</div>



<?= $this->endSection() ?>
