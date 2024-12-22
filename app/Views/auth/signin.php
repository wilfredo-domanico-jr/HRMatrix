<div class="container full-height d-flex justify-content-center align-items-center">


    <div class="d-flex align-items-center justify-content-center w-100 h-50">

        <div class="p-4 w-50 h-50">
            <h1 class="fw-bold text-white animate__animated animate__backInLeft">HRMatrix</h1>
            <h3 class="animate__animated animate__backInUp">Your trusted partner in building a Culture of Excellence</h3>

        </div>

        <div class="m-4 p-2 bg-white rounded h-100 text-center animate__animated animate__backInRight" style="width: 30%;">

            <form action="<?php echo base_url(); ?>/SigninController/loginAuth" method="post" class="p-4">

                <img src="<?php echo base_url('images/HRMatrixLogo.png'); ?>" class="img-fluid" style="height:8rem;" alt="HR Matrix Logo">

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control" value="<?= set_value('email') ?>" placeholder="Enter Email">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password">
                </div>

                <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>

                <a href="/" class="nav-link text-secondary">Forgot password?</a>

                <hr>

                <a href="" class="btn btn-dark w-100">Create an Account</a>
            </form>


        </div>
    </div>


</div>