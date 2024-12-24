<?= $this->extend('layout/main-layout/authenticated') ?>


<?= $this->section('content') ?>


<div class="page-title">
    <h1 class="text-primary">Create Department</h1>
</div>

<section class="shadow-lg">

    <form action="<?= base_url('departments/store') ?>" method="POST">
        <div class="row">

            <div class="col-6 mb-4">

                <div class="form-floating">
                    <input type="text" class="form-control" name="departmentID" required>
                    <label>Department ID</label>
                </div>

            </div>

            <div class="col-6 mb-4">

                <div class="form-floating">
                    <input type="text" class="form-control" name="department_description" required>
                    <label>Department Name</label>
                </div>

            </div>

        </div>


        <div class="mt-4">

        <button type="submit" class="btn btn-outline-success"><i class="fas fa-upload"></i> <span>Submit</span></button>

            <a href="<?= base_url('departments') ?>" class="btn btn-outline-danger">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Go Back</span>
            </a>

        
        </div>
    </form>


</section>


<?= $this->endSection() ?>