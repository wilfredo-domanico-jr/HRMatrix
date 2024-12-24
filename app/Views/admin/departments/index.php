<?= $this->extend('layout/main-layout/authenticated') ?>

 
<?= $this->section('content') ?> 


<div class="page-title page-title-w-button">
    <h1 class="text-primary">Departments</h1>

    <div class="dropdown">
        <a href="<?= base_url('departments/create') ?>" class="btn btn-outline-success">
            <i class="fa-solid fa-plus"></i>
            <span>Create Department</span>
        </a>
    </div>
</div>

<section class="shadow-lg">


    <div class="table-container">
        <table class="table">
            <thead class="bg-primary">
                <tr>
                    <th class="text-white">Department ID</th>
                    <th class="text-white">Department Description</th>
                    <th class="text-white">Action</th>
                </tr>
            </thead>
            <tbody>
               
                <?php if (!empty($departments)) : ?>
                    <?php foreach ($departments as $department) : ?>
                        <tr>
                            <td><a href="<?= base_url('departments/show/') . $department['DEPT_ID'] ?>" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"><?= $department['DEPT_ID'] ?></a></td>
                            <td><?= $department['DEPT_NAME'] ?></td>
                            <td>
                                <form id="department_<?= $department['DEPT_ID'] ?>" action="<?= base_url('departments/delete/') . $department['DEPT_ID'] ?>" method="POST">
                                    <button type="button" class="btn btn-outline-danger" onclick="confirmDelete('department_<?= $department['DEPT_ID'] ?>')">
                                        <i class="fa-solid fa-trash-alt"></i> <span>Delete</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4" class="text-center">No Departments Found</td>
                    </tr>
                <?php endif; ?>
              

            </tbody>

          
        </table>
                  

        <?= $pager->makeLinks($page,$perPage, $total, 'bootstrap_pagination') ?>

    </div>


</section>

<script>
    function confirmDelete(departmentID) {

        
        Swal.fire({
            title: 'Are you sure you want to delete this department?',
            text: "This can't be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, submit the form
                document.getElementById(departmentID).submit();
            }
        });
    }
</script>

<?= $this->endSection() ?>
