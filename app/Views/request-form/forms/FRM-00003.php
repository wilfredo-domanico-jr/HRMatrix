<div class="page-title">
  <h1><?= $formDetail['FORM_DESCRIPTION'] ?></h1>

</div>

<section>

  <form action="<?= base_url('request-forms/store/').$formDetail['FORM_ID']?> " method="POST">

    <div class="row">

      <div class="col-4">

        <div class="form-floating mb-3">
          <input type="date" class="form-control" name="date" value="<?= date('Y-m-d') ?>" required>
          <label for="floatingInput">Date</label>
        </div>

      </div>

      <div class="col-4">

        <div style="border-color:#ced4da !important ;" class="py-1 px-3 border border-1 rounded">

              <label class="text-secondary small">Time</label>
              <div class="text-center">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Time" id="radioAM" value="AM" checked>
                    <label class="form-check-label">Morning</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Time" id="radioPM" value="PM">
                    <label class="form-check-label">Afternoon</label>
                  </div>
              </div>

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