<?= $this->extend('layout/main-layout/authenticated') ?>


<?= $this->section('content') ?> 


<div class="page-title page-title-w-button">
    <h1 class="text-primary">Tasks</h1>

    <div class="dropdown">
        <a href="<?= base_url('tasks/create') ?>" class="btn btn-outline-success">
            <i class="fa-solid fa-plus"></i>
            <span>Create Task</span>
        </a>
    </div>
</div>

<section class="shadow-lg">


    <div class="table-container">
        <table class="table">
            <thead class="bg-primary">
                <tr>
                    <th class="text-white">Task No.</th>
                    <th class="text-white">Title</th>
                    <th class="text-white">Start Date</th>
                    <th class="text-white">End Date</th>
                    <th class="text-white">Status</th>
                    <th class="text-white">Action</th>
                </tr>
            </thead>
            <tbody>
               
            <?php if (!empty($tasks)) : ?>
                    <?php foreach ($tasks as $task) : ?>
                        <tr>
                            <td><a href="<?= base_url('tasks/show/') . $task['TASK_ID'] ?>" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"><?= $task['TASK_ID'] ?></a></td>
                            <td><?= $task['TITLE'] ?></td>
                            <td><?= $task['START_DATE'] ?></td>
                            <td><?= $task['END_DATE'] ?></td>
                            <td>

                                <?php
                                
                                     
                                   

                                    if ($task['STATUS'] == 0) {
                                        $badgeClass = 'bg-warning'; 
                                        $label = 'Ongoing'; 
                                    } elseif ($task['STATUS'] == 1) {
                                        $badgeClass = 'bg-danger';
                                        $label = 'Canceled'; 
                                    } elseif ($task['STATUS'] == 2) {
                                        $badgeClass = 'bg-success';
                                        $label = 'Completed'; 
                                    } else {
                                        $badgeClass = 'bg-secondary'; 
                                        $label = 'Ongoing'; 
                                    }

                                
                                ?>
                                <span class="badge <?= $badgeClass ?>"><?= $label ?></span></td>
                            <td>

                                <form id="task_<?= $task['TASK_ID'] ?>" action="<?= base_url('tasks/delete/') . $task['TASK_ID'] ?>" method="POST">
                                    <button type="button" class="btn btn-outline-danger" onclick="confirmDelete('task_<?= $task['TASK_ID'] ?>')">
                                        <i class="fa-solid fa-trash-alt"></i> <span>Delete</span>
                                    </button>
                                </form>


                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" class="text-center">No Tasks Found</td>
                    </tr>
                <?php endif; ?>
              

            </tbody>

          
        </table>
                  
        <?= $pager->makeLinks($page,$perPage, $total, 'bootstrap_pagination') ?>


    </div>

</section>

<script>
    function confirmDelete(taskID) {

        
        Swal.fire({
            title: 'Are you sure you want to delete this task?',
            text: "This can't be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, submit the form
                document.getElementById(taskID).submit();
            }
        });
    }
</script>

<?= $this->endSection() ?>
