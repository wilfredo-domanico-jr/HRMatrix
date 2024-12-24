<?= $this->extend('layout/main-layout/authenticated') ?>

 
<?= $this->section('content') ?> 


<div class="page-title page-title-w-button">
    <h1 class="text-primary">Users</h1>

    <div class="dropdown">
        <a href="<?= base_url('users/create') ?>" class="btn btn-outline-success">
            <i class="fa-solid fa-plus"></i>
            <span>Create User</span>
        </a>
    </div>
</div>

<section class="shadow-lg">


    <div class="table-container">
        <table class="table">
            <thead class="bg-primary">
                <tr>
                    <th class="text-white">Name</th>
                    <th class="text-white">Email</th>
                    <th class="text-white">Department</th>
                    <th class="text-white">Role</th>
                    <th class="text-white">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php if (!empty($users)) : ?>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><a href="<?= base_url('users/show/') . $user['id'] ?>" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"><?= $user['name'] ?></a></td>
                           <td><?= $user['email'] ?></td>
                            <td><?= $user['DEPT_NAME'] ?></td>
                            <td>
                            <?php if (!empty($user['role_id'])): ?>
                                <?= $user['ROLE_DESC'] ?>
                            <?php else: ?>
                                <span class="text-secondary">No Role Assigned</span>
                            <?php endif; ?>
                            </td>
                            <td>

                                <form id="user_<?= $user['id'] ?>" action="<?= base_url('users/delete/') . $user['id'] ?>" method="POST">
                                    <button type="button" class="btn btn-outline-danger" onclick="confirmDelete('user_<?= $user['id'] ?>')">
                                        <i class="fa-solid fa-trash-alt"></i> <span>Delete</span>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4" class="text-center">No Users Found</td>
                    </tr>
                <?php endif; ?>
              

            </tbody>

          
        </table>
                  

        <?= $pager->makeLinks($page,$perPage, $total, 'bootstrap_pagination') ?>

    </div>


</section>

<script>
    function confirmDelete(userId) {

        
        Swal.fire({
            title: 'Are you sure you want to delete this user?',
            text: "This can't be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, submit the form
                document.getElementById(userId).submit();
            }
        });
    }
</script>

<?= $this->endSection() ?>
