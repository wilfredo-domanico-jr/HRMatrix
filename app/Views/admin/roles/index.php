<?= $this->extend('layout/main-layout/authenticated') ?>

 
<?= $this->section('content') ?> 


<div class="page-title page-title-w-button">
    <h1 class="text-primary">Roles</h1>

    <div class="dropdown">
        <a href="<?= base_url('roles/create') ?>" class="btn btn-outline-success">
            <i class="fa-solid fa-plus"></i>
            <span>Create Role</span>
        </a>
    </div>
</div>

<section class="shadow-lg">


    <div class="table-container">
        <table class="table">
            <thead class="bg-primary">
                <tr>
                    <th class="text-white">Role ID</th>
                    <th class="text-white">Role Description</th>
                    <th class="text-white">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php if (!empty($roles)) : ?>
                    <?php foreach ($roles as $role) : ?>
                        <tr>
                            <td><a href="<?= base_url('roles/show/') . $role['ROLE_ID'] ?>" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"><?= $role['ROLE_ID'] ?></a></td>
                            <td><?= $role['ROLE_DESC'] ?></td>
                            <td>
                                <form id="role_<?= $role['ROLE_ID'] ?>" action="<?= base_url('roles/delete/') . $role['ROLE_ID'] ?>" method="POST">
                                    <button type="button" class="btn btn-outline-danger" onclick="confirmDelete('role_<?= $role['ROLE_ID'] ?>')">
                                        <i class="fa-solid fa-trash-alt"></i> <span>Delete</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4" class="text-center">No Roles Found</td>
                    </tr>
                <?php endif; ?>
              

            </tbody>

          
        </table>
                  

        <?= $pager->makeLinks($page,$perPage, $total, 'bootstrap_pagination') ?>

    </div>


</section>

<script>
    function confirmDelete(roleId) {

        
        Swal.fire({
            title: 'Are you sure you want to delete this role?',
            text: "This can't be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, submit the form
                document.getElementById(roleId).submit();
            }
        });
    }
</script>

<?= $this->endSection() ?>
