<?= $this->extend('layout/main-layout/authenticated') ?>


<?= $this->section('content') ?>


<div class="page-title">
    <h1 class="text-primary">View User Detail</h1>
</div>

<section class="shadow-lg">

    <form action="<?= base_url('users/update').'/'.$user['id'] ?>" method="POST">
        <div class="row">

            <div class="col-4 mb-4">

                <div class="form-floating">
                    <input type="text" class="form-control" name="name" value="<?= $user['name'] ?>" readonly>
                    <label>Name</label>
                </div>

            </div>

            <div class="col-4 mb-4">

                <div class="form-floating">
                    <input type="email" class="form-control" name="email" value="<?= $user['email'] ?>" readonly>
                    <label>Email</label>
                </div>

            </div>

            <div class="col-4 mb-4">

                <div class="form-floating">
                    <input type="date" class="form-control" name="birth_date" value="<?= $user['birth_date'] ?>">
                    <label>Birthdate</label>
                </div>

            </div>

            <div class="col-6 mb-4">

                <div class="form-floating">

                    <select name="department" class="form-select" required>
                        <option value="" selected disabled>Select Department</option>
                        <?php foreach ($departments as $department) : ?>
                            <option value="<?= $department['DEPT_ID'] ?>" <?= ($department['DEPT_ID'] == $user['department_id']) ? 'selected' : '' ?>>
                                <?= $department['DEPT_NAME'] ?> 
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <label>Department</label>
                </div>

            </div>


            <div class="col-6 mb-4">

                <div class="form-floating">

                    <select name="role" class="form-select" required>
                        <option value="" selected disabled>Select Role</option>
                        <?php foreach ($roles as $role) : ?>
                            <option value="<?= $role['ROLE_ID'] ?>" <?= ($role['ROLE_ID'] == $user['role_id']) ? 'selected' : '' ?>>
                                <?= $role['ROLE_DESC'] ?> 
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <label>Role</label>
                </div>

            </div>
            


        </div>


        <div class="mt-4">

        <button type="submit" class="btn btn-outline-primary"><i class="fas fa-edit"></i> <span>Update</span></button>

            <a href="<?= base_url('users') ?>" class="btn btn-outline-danger">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Go Back</span>
            </a>

        
        </div>
    </form>


</section>


<?= $this->endSection() ?>