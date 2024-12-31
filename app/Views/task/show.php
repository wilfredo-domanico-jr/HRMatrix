<?= $this->extend('layout/main-layout/authenticated') ?>


<?= $this->section('content') ?>


<div class="page-title">
    <h1 class="text-primary">Show Task</h1>
</div>

<section class="shadow-lg">

    <form action="<?= base_url('tasks/update/').$task['TASK_ID'] ?>" method="POST">
        <div class="row">

            <div class="col-3 mb-4">

                <div class="form-floating">
                    <input type="text" class="form-control" value="<?= $task['TASK_ID'] ?>" name="title" required>
                    <label>Title</label>
                </div>

            </div>

            <div class="col-3 mb-4">

                <div class="form-floating">
                    <input type="date" class="form-control" value="<?= $task['START_DATE'] ?>" name="start_date" required>
                    <label>Start Date</label>
                </div>

            </div>

            <div class="col-3 mb-4">

                <div class="form-floating">
                    <input type="date" class="form-control" value="<?= $task['END_DATE'] ?>" name="end_date" required>
                    <label>End Date</label>
                </div>

            </div>

            <div class="col-3 mb-4">

                <div class="form-floating">
                <select class="form-select" name="employee_id" required>
                    <option selected value="" disabled>Select Employee</option>
                   
                    <?php foreach ($employees as $employee) : ?>
                        <option value="<?= $employee['id'] ?>"

                            <?php if($employee['id'] == $task['EMPLOYEE_ID']){ ?>
                                selected
                            <?php } ?>
                        ><?= $employee['name'] ?></option>
                    <?php endforeach; ?>
                </select>
                    <label>Assign to</label>
                </div>

            </div>


            <div class="col-12 mb-4">

                <div class="form-floating">
                    <textarea class="form-control" rows="5" name="description" required style="height:200px"><?= $task['DESCRIPTION'] ?></textarea>
                    <label>Description</label>
                </div>

            </div>

            <div class="col-3 mb-4">

                                

                <div class="form-floating">
                    <select class="form-select" name="status" required>
                         <option value="0" <?= ($task['STATUS'] == 0) ? 'selected' : ''; ?>>Ongoing</option>
                         <option value="1" <?= ($task['STATUS'] == 1) ? 'selected' : ''; ?>>Canceled</option>
                         <option value="2" <?= ($task['STATUS'] == 2) ? 'selected' : ''; ?>>Completed</option>
                    </select>
                    <label>Status</label>
                </div>

            </div>

        </div>


        <div class="mt-4">

        <button type="submit" class="btn btn-outline-primary"><i class="fas fa-edit"></i> <span>Update</span></button>

            <a href="<?= base_url('tasks') ?>" class="btn btn-outline-danger">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Go Back</span>
            </a>

        
        </div>
    </form>


</section>


<?= $this->endSection() ?>