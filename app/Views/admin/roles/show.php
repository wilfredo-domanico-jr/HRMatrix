<?= $this->extend('layout/main-layout/authenticated') ?>


<?= $this->section('content') ?>


<div class="page-title">
    <h1 class="text-primary">View Role Detail</h1>
</div>

<section class="shadow-lg">

    <form action="<?= base_url('roles/update').'/'.$role['ROLE_ID'] ?>" method="POST">
        <div class="row">

            <div class="col-6 mb-4">

                <div class="form-floating">
                    <input type="text" class="form-control" value="<?= $role['ROLE_ID'] ?>" readonly>
                    <label>Role ID</label>
                </div>

            </div>

            <div class="col-6 mb-4">

                <div class="form-floating">
                    <input type="text" class="form-control" name="role_description" value="<?= $role['ROLE_DESC'] ?>" required>
                    <label>Role Name</label>
                </div>

            </div>

        </div>


        <div class="mt-4">

        <button type="submit" class="btn btn-outline-success"><i class="fas fa-upload"></i> <span>Submit</span></button>

            <a href="<?= base_url('roles') ?>" class="btn btn-outline-danger">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Go Back</span>
            </a>

        
        </div>
    </form>


</section>


<?= $this->endSection() ?>