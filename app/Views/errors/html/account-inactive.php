
<?= $this->extend('layout/main-layout/guest') ?>

 
<?= $this->section('content') ?>

<div class="container full-height d-flex justify-content-center align-items-center">


    <div class="d-flex align-items-center justify-content-center w-100 h-75">

       

        <div class="m-4 p-2 h-100 w-100 text-center d-flex flex-column justify-content-center align-items-center">
                <div class="rounded-circle bg-white mb-4">
                    <img src="<?php echo base_url('images/HRMatrixLogo.png'); ?>" class="img-fluid" style="height:15rem;" alt="HR Matrix Logo">
                </div>
                
                <h1 class="text-white mb-4">Account Inactive</h1>
                <p class="h4 bg-white p-4 rounded w-75">
                    The system detected that the status of the account that you are accessing is inactive. 
                    If you think there's something wrong. Please contact the administrator. Thank you !
                </p>

        </div>


    </div>


</div>


<?= $this->endSection() ?>
