<div class="page-title">
  <h1>View Request</h1>

</div>

<section>


    <div class="row">

      <div class="col-4">
        <div class="form-floating mb-3">
          <input type="date" class="form-control" name="date" value="<?= $formDetail['OT_DATE'] ?>" required>
          <label for="floatingInput">Date</label>
        </div>

      </div>

      <div class="col-4">
        <div class="form-floating mb-3">
          <select class="form-select" name="overtime_type" required>
            <?php if (!empty($overtimeTypes)) : ?>
              <option value="" disabled selected>Select Overtime Type</option>
              <?php foreach ($overtimeTypes as $overtimeType) : ?>
                <option value="<?= $overtimeType['TYPE_ID'] ?>" <?= $overtimeType['TYPE_ID'] == $formDetail['OT_TYPE'] ? 'selected' : '' ?> ><?= $overtimeType['DESCRIPTION'] ?></option>
              <?php endforeach; ?>
            <?php else : ?>
              <option disabled selected>No Overtime Type</option>
            <?php endif; ?>

          </select>
          <label for="floatingInput">Overtime Type</label>
        </div>



      </div>

      <div class="col-4">

        <div class="input-group mb-3">

          <div class="form-floating mb-3">
            <input type="number" min="0" max="24" name="hour" value="<?= $formDetail['HOUR'] ?>" class="form-control" required>
            <label for="floatingInput">Hour</label>
          </div>

          <div class="form-floating mb-3">
            <input type="number" min="0" max="59" name="minute" value="<?= $formDetail['MINUTE'] ?>" class="form-control" required>
            <label for="floatingInput">Minutes</label>
          </div>


        </div>


      </div>


    </div>

    <div class="row">
      <div class="col-12">
        <div class="form-floating">
          <textarea class="form-control" name="purpose" style="height: 100px" required><?= $formDetail['PURPOSE'] ?></textarea>
          <label for="floatingTextarea2">Purpose</label>
        </div>
      </div>

    </div>

    <div class="container mt-4">

      <a href="<?= base_url('request-forms') ?>" class="btn btn-outline-danger">
        <i class="fa-solid fa-arrow-left"></i>
        <span>Go Back</span>
      </a>
    </div>


</section>