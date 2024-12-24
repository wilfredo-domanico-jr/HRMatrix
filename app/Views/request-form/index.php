<?= $this->extend('layout/main-layout/authenticated') ?>

 
<?= $this->section('content') ?> 


<div class="page-title page-title-w-button">
    <h1 class="text-primary">Request History</h1>


    <div class="dropdown">
        <button class="btn btn-outline-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-plus"></i>
            <span>Create Form</span>
        </button>
        <ul class="dropdown-menu">
            <?php if (!empty($formTypes)) : ?>
                <?php foreach ($formTypes as $formType) : ?>
                    <li><a class="dropdown-item" href="<?= base_url('request-forms/create/') . $formType['FORM_ID'] ?>"><?= esc($formType['FORM_DESCRIPTION']) ?></a></li>
                <?php endforeach; ?>
            <?php else : ?>
                <li>No form types</li>
            <?php endif; ?>

        </ul>
    </div>
</div>

<section class="shadow-lg">


    <div class="table-container">
        <table class="table">
            <thead class="bg-primary">
                <tr>
                    <th class="text-white">Request ID</th>
                    <th class="text-white">Request Type</th>
                    <th class="text-white">Date Created</th>
                    <th class="text-white">Status</th>
                    <th class="text-white">Delete</th>
                </tr>
            </thead>
            <tbody>

                <?php if (!empty($userRequest)) : ?>
                    <?php foreach ($userRequest as $request) : ?>
                    <tr>
                        <td><a href="<?= base_url('request-forms/show/').$request['REQUEST_ID']?>" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"><?= $request['REQUEST_ID']?></a></td>
                        <td><?= $request['FORM_DESCRIPTION']?></td>
                        <td><?= $request['DATE_CREATED']?></td>
                        <td><?= $request['STATUS']?></td>
                        <td>

                            <form id="requestForm_<?= $request['REQUEST_ID'] ?>" action="<?= base_url('request-forms/delete/') . $request['REQUEST_ID'] ?>" method="POST">
                                <button type="button" class="btn btn-outline-danger" onclick="confirmDelete('requestForm_<?= $request['REQUEST_ID'] ?>')">
                                    <i class="fa-solid fa-trash-alt"></i> <span>Delete</span>
                                </button>
                            </form>

                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5" class="text-center">No Request Found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <?php
            if(!empty($userRequest)){
                echo $pager->makeLinks($page,$perPage, $total, 'bootstrap_pagination');
            }
            
        ?>
        
    </div>


</section>

<script>
    function confirmDelete(requestId) {
        Swal.fire({
            title: 'Are you sure you want to delete this request?',
            text: "This can't be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, submit the form
                document.getElementById(requestId).submit();
            }
        });
    }
</script>


        
<?= $this->endSection() ?>


