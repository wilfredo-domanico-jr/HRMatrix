<div class="page-title">
  <h1><?= $formDetail['FORM_DESCRIPTION'] ?></h1>

</div>

<section>

  <form action="<?= base_url('request-forms/store/') . $formDetail['FORM_ID'] ?> " method="POST">

    <div class="row mb-3">



      <div class="col-6">

        <div style="border-color:#ced4da !important ;" class="py-1 px-3 border border-1 rounded">

          <label class="text-secondary small">Leave Type</label>
          <div class="text-center">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="Type" id="radioVac" value="0" checked>
              <label class="form-check-label">Vacation</label>
            </div>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="Type" id="radioSick" value="1">
              <label class="form-check-label">Sickness</label>
            </div>
          </div>

        </div>

      </div>


      <div class="col-6">

        <div style="border-color:#ced4da !important ;" class="py-1 px-3 border border-1 rounded">

          <label class="text-secondary small">Leave Credits </label>
          <div class="text-center">
            <div class="form-check form-check-inline">
              <span class="badge bg-primary">Vacation = <?= $credits['vacation_credits'] ?></span>
            </div>

            <div class="form-check form-check-inline">
              <span class="badge bg-danger">Sickness = <?= $credits['sickness_credits'] ?></span>
            </div>
          </div>

        </div>

      </div>

    </div>

    <div class="row mb-1">


      <div class="col-6">

        <div class="form-floating mb-3">
          <input type="date" class="form-control" name="date" value="<?= date('Y-m-d') ?>" required>
          <label for="floatingInput">Date</label>
        </div>

      </div>


      <div class="col-3">

        <div class="form-floating mb-3">
          <input type="time" class="form-control" name="from" required value="08:00">
          <label for="floatingInput">From</label>
        </div>

      </div>

      <div class="col-3">

        <div class="form-floating mb-3">
          <input type="time" class="form-control" name="to"  required value="17:00">
          <label for="floatingInput">To</label>
        </div>

      </div>

    </div>

    </div>

    <div class="row">
      <div class="col-12">
        <div class="form-floating">
          <textarea class="form-control" name="reason" style="height: 100px" required></textarea>
          <label for="floatingTextarea2">Reason</label>
        </div>
      </div>
    </div>

    <div class="container mt-4">
      <button type="submit" class="btn btn-outline-success">
        <i class="fa-solid fa-upload"></i>
        <span>
          Submit
        </span>
      </button>
      <a href="<?= base_url('request-forms') ?>" class="btn btn-outline-danger">
        <i class="fa-solid fa-ban"></i>
        <span>Cancel</span>
      </a>
    </div>


  </form>



</section>