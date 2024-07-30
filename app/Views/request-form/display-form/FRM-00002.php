<div class="page-title">
  <h1>View Request</h1>

</div>

<section>


  <form action="<?= base_url('request-forms/update/').$formDetail['REQUEST_ID'] ?> " method="POST">

    <div class="row">

      <div class="col-4">
        <div class="form-floating mb-3">
          <input type="date" class="form-control" name="date" value="<?= $formDetail['UT_DATE'] ?>" required>
          <label for="floatingInput">Date</label>
        </div>

      </div>


    </div>

    <div class="row">
      <div class="col-12">
        <div class="form-floating">
          <textarea class="form-control" name="reason" style="height: 100px" required><?= $formDetail['REASON'] ?></textarea>
          <label for="floatingTextarea2">Reason</label>
        </div>
      </div>

    </div>

    <div class="container mt-4">
      <button type="submit" class="btn btn-outline-primary">
        <i class="fa-solid fa-edit"></i>
        <span>
          Update
        </span>
      </button>
      <a href="<?= base_url('request-forms') ?>" class="btn btn-outline-danger">
        <i class="fa-solid fa-ban"></i>
        <span>Cancel</span>
      </a>
    </div>


</section>