<div class="page-title">
  <h1>View Request</h1>

</div>

<section>

  <form action="<?= base_url('request-forms/update/').$formDetail['REQUEST_ID'] ?> " method="POST">


    <div class="row mb-1">

    <div class="col-4">

        <div style="border-color:#ced4da !important ;" class="py-1 px-3 border border-1 rounded">

          <label class="text-secondary small">Leave Type</label>
          <div class="text-center">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="Type" id="radioVac" value="0"  <?= ($formDetail['LEAVE_TYPE'] == 0) ? 'checked' : '' ?>>
              <label class="form-check-label">Vacation</label>
            </div>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="Type" id="radioSick" value="1"  <?= ($formDetail['LEAVE_TYPE'] == 1) ? 'checked' : '' ?>>
              <label class="form-check-label">Sickness</label>
            </div>
          </div>

        </div>

</div>


      <div class="col-4">

        <div class="form-floating mb-3">
          <input type="date" class="form-control" name="date" value="<?= $formDetail['DATE'] ?>" required>
          <label for="floatingInput">Date</label>
        </div>

      </div>


      <div class="col-2">

        <div class="form-floating mb-3">
          <input type="time" class="form-control" name="from" required value="<?= $formDetail['FROM'] ?>">
          <label for="floatingInput">From</label>
        </div>

      </div>

      <div class="col-2">

        <div class="form-floating mb-3">
          <input type="time" class="form-control" name="to"  required value="<?= $formDetail['TO'] ?>">
          <label for="floatingInput">To</label>
        </div>

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


  </form>



</section>