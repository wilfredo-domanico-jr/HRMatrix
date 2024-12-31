<?= $this->extend('layout/main-layout/authenticated') ?>


<?= $this->section('content') ?>


<div class="page-title">
    <h1 class="text-primary">Create Task</h1>
</div>

<section class="shadow-lg">

    <form action="<?= base_url('tasks/store') ?>" method="POST">
        <div class="row">

            <div class="col-3 mb-4">

                <div class="form-floating">
                    <input type="text" class="form-control" name="title" required>
                    <label>Title</label>
                </div>

            </div>

            <div class="col-3 mb-4">

                <div class="form-floating">
                    <input type="date" class="form-control" name="start_date" required>
                    <label>Start Date</label>
                </div>

            </div>

            <div class="col-3 mb-4">

                <div class="form-floating">
                    <input type="date" class="form-control" name="end_date" required>
                    <label>End Date</label>
                </div>

            </div>

            <div class="col-3 mb-4">

                <div class="form-floating">
                <select class="form-select" name="employee_id" required>
                    <option selected value="" disabled>Select Employee</option>
                   
                    <?php foreach ($employees as $employee) : ?>
                        <option value="<?= $employee['id'] ?>"><?= $employee['name'] ?></option>
                    <?php endforeach; ?>
                </select>
                    <label>Assign to</label>
                </div>

            </div>


            <div class="col-12 mb-4">

                <div class="form-floating">
                    <textarea class="form-control" rows="5" name="description" required style="height:200px"></textarea>
                    <label>Description</label>
                </div>

            </div>

        </div>


        <div class="mt-4">

        <button type="submit" class="btn btn-outline-success"><i class="fas fa-upload"></i> <span>Submit</span></button>

            <a href="<?= base_url('tasks') ?>" class="btn btn-outline-danger">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Go Back</span>
            </a>

        
        </div>
    </form>


</section>


<?= $this->endSection() ?>