<?= $this->extend('layout/main-layout/authenticated') ?>


<?= $this->section('content') ?>


<div class="page-title">
    <h1 class="text-primary">Create User</h1>
</div>

<section class="shadow-lg">

    <form action="<?= base_url('users/store') ?>" method="POST">
        <div class="row">

            <div class="col-4 mb-4">

                <div class="form-floating">
                    <input type="text" class="form-control" name="name" required>
                    <label>Name</label>
                </div>

            </div>

            <div class="col-4 mb-4">

                <div class="form-floating">
                    <input type="email" class="form-control" name="email" required>
                    <label>Email</label>
                </div>

            </div>

            <div class="col-4 mb-4">

                <div class="form-floating">

                    <select name="department" class="form-select" required>
                        <option value="" selected disabled>Select Department</option>
                        <?php foreach ($departments as $department) : ?>
                            <option value="<?= $department['DEPT_ID'] ?>"><?= $department['DEPT_NAME'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label>Department</label>
                </div>

            </div>


            <div class="col-4 mb-4">

                <div class="form-floating">
                    <input type="password" class="form-control" name="initial_password" required>
                    <label>Initial Password</label>
                </div>

            </div>

            <div class="col-4 mb-4">

                <div class="form-floating">
                    <input type="password" class="form-control" name="initial_password_confirmation" required>
                    <label>Confirm Initial Password</label>
                </div>

            </div>

            <div class="col-4 mb-4">

                <div class="form-floating">

                    <select name="role" class="form-select" required>
                        <option value="" selected disabled>Select Role</option>
                        <?php foreach ($roles as $role) : ?>
                            <option value="<?= $role['ROLE_ID'] ?>"><?= $role['ROLE_DESC'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label>Role</label>
                </div>

            </div>
            


        </div>


        <div class="mt-4">

        <button type="submit" class="btn btn-outline-success"><i class="fas fa-upload"></i> <span>Submit</span></button>

            <a href="<?= base_url('users') ?>" class="btn btn-outline-danger">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Go Back</span>
            </a>

        
        </div>
    </form>


</section>


<?= $this->endSection() ?>