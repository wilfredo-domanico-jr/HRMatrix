<?= $this->extend('layout/main-layout/authenticated') ?>

 
<?= $this->section('content') ?> 


<div class="page-title">
  <h1>View Request</h1>

</div>

<section>


    <div class="row">

      <div class="col-4">

        <div class="form-floating mb-3">
          <input type="date" class="form-control" name="from_date" value="<?= $formDetail['FROM'] ?>" required>
          <label for="floatingInput">From</label>
        </div>

      </div>

      <div class="col-4">

        <div class="form-floating mb-3">
          <input type="date" class="form-control" name="to_date" value="<?= $formDetail['TO'] ?>" required>
          <label for="floatingInput">To</label>
        </div>

      </div>

      <div class="col-4">

        <div class="form-floating mb-3">
        <select class="form-select" name ="Leave Type" required>

            <?php if (!empty($mandatoryLeaveTypes)) : ?>
              <option value="" disabled selected>Select Leave Type</option>
              <?php foreach ($mandatoryLeaveTypes as $mandatoryLeaveType) : ?>
                <option value="<?= $mandatoryLeaveType['TYPE_ID'] ?>" <?= $mandatoryLeaveType['TYPE_ID'] == $formDetail['LEAVE_TYPE'] ? 'selected' : '' ?> ><?= $mandatoryLeaveType['DESCRIPTION'] ?></option>
              <?php endforeach; ?>
            <?php else : ?>
              <option disabled selected>No Leave Type</option>
            <?php endif; ?>

        </select>
          <label for="floatingInput">Leave Type</label>
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

      <a href="<?= base_url('request-forms') ?>" class="btn btn-outline-danger">
        <i class="fa-solid fa-arrow-left"></i>
        <span>Go Back</span>
      </a>
    </div>



  </form>



</section>


        
<?= $this->endSection() ?>