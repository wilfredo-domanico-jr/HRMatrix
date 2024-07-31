<div class="page-title">
  <h1><?= $formDetail['FORM_DESCRIPTION'] ?></h1>

</div>

<section>

  <form action="<?= base_url('request-forms/store/') . $formDetail['FORM_ID'] ?> " method="POST">

    <div class="table-responsive">

      <table class="table text-center">

        <thead>
          <tr>
            <th class="text-center text-primary" colspan ="4">
              Ordinary Working Day (Mon - Fri): (Rate: 1.0)
            </th>
          </tr>
          <tr>
            <th><input class="form-check-input" type="checkbox" id="selectAllRegOTCheckbox"></th>
            <th>Overtime Date</th>
            <th>Conversion</th>
            <th>Total Credits</th>
          </tr>
        </thead>
        <tbody>

          <?php if (!empty($ordinaryWorkingOT)) : ?>
            <?php foreach ($ordinaryWorkingOT as $reGindex => $ordOT) : ?>

              <tr>
                <td><input class="form-check-input regular-ot" type="checkbox" name="regularOT[<?= $reGindex ?>]" value="<?= $ordOT['UNIQUE_ID'] ?>"></td>
                <td><?= $ordOT['DATE'] ?> </td>
                <td><?= $ordOT['HOURS'] ?> hr/s <?= $ordOT['MINUTES'] ?> min/s x 1.0</td>
                <td id="regularOT<?= $reGindex ?>"><?= number_format((($ordOT['HOURS'] * 60) + $ordOT['MINUTES']) * 1.0 / 60, 2) ?></td>
              </tr>
            <?php endforeach; ?>

            <tr>
              <td colspan="4">
                <center>
                <div class="input-group mb-3" style="width:25%;">
                <span class="input-group-text fw-bold">Total Credit/s:</span>
                <input type="text" class="form-control text-center" id="selectedCreditsRegOT" value="0" disabled>
              </div>
                </center>
              </td>
            </tr>
          <?php else : ?>
            <tr>
              <td colspan="4" class="text-center">No Overtime Credits</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>


    </div>



    <div class="table-responsive">

      <table class="table text-center">

        <thead>
          <tr>
            <th class="text-center text-primary" colspan ="4">
            Rest Day Overtime (Saturday/Sunday) / Special Holiday (Special Day): (Rate: 1.05)
            </th>
          </tr>
          <tr>
            <th><input class="form-check-input" type="checkbox" id="selectAllRestDayOTCheckbox"></th>
            <th>Overtime Date</th>
            <th>Conversion</th>
            <th>Total Credits</th>
          </tr>
        </thead>
        <tbody>

          <?php if (!empty($restDayOT)) : ?>
            <?php foreach ($restDayOT as $restDayindex => $restOT) : ?>

              <tr>
                <td><input class="form-check-input restday-ot" type="checkbox" name="restDayOT[<?= $restDayindex ?>]" value="<?= $restOT['UNIQUE_ID'] ?>"></td>
                <td><?= $restOT['DATE'] ?> </td>
                <td><?= $restOT['HOURS'] ?> hr/s <?= $restOT['MINUTES'] ?> min/s x 1.05</td>
                <td id="restdayOT<?= $restDayindex ?>"><?= number_format((($restOT['HOURS'] * 60) + $restOT['MINUTES']) * 1.05 / 60, 2) ?></td>
              </tr>
            <?php endforeach; ?>

            <tr>
              <td colspan="4">
                <center>
                <div class="input-group mb-3" style="width:25%;">
                <span class="input-group-text fw-bold">Total Credit/s:</span>
                <input type="text" id="selectedCreditsRestDayOT" class="form-control text-center" value="0" disabled>
              </div>
                </center>
              </td>
            </tr>

          <?php else : ?>
            <tr>
              <td colspan="4" class="text-center">No Rest Day Overtime Credits</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <div class="table-responsive">

<table class="table text-center">

  <thead>
    <tr>
      <th class="text-center text-primary" colspan ="4">
      Rest Day Overtime (Saturday/Sunday) falling on Special Holiday (Special Day): (Rate: 1.25)
      </th>
    </tr>
    <tr>
      <th><input class="form-check-input" type="checkbox" id="selectAllSpecialOTCheckbox"></th>
      <th>Overtime Date</th>
      <th>Conversion</th>
      <th>Total Credits</th>
    </tr>
  </thead>
  <tbody>

    <?php if (!empty($specialOT)) : ?>
      <?php foreach ($specialOT as $specialOTindex => $speOT) : ?>

        <tr>
          <td><input class="form-check-input special-ot" type="checkbox" name="specialOT[<?= $specialOTindex ?>]" value="<?= $speOT['UNIQUE_ID'] ?>"></td>
          <td><?= $speOT['DATE'] ?> </td>
          <td><?= $speOT['HOURS'] ?> hr/s <?= $speOT['MINUTES'] ?> min/s x 1.25</td>
          <td id="specialdayOT<?= $specialOTindex ?>"><?= number_format((($speOT['HOURS'] * 60) + $speOT['MINUTES']) * 1.25 / 60, 2) ?></td>
        </tr>
      <?php endforeach; ?>

      <tr>
              <td colspan="4">
                <center>
                <div class="input-group mb-3" style="width:25%;">
                <span class="input-group-text fw-bold">Total Credit/s:</span>
                <input type="text" id="selectedCreditsSpecialDayOT" class="form-control text-center" value="0" disabled>
              </div>
                </center>
              </td>
            </tr>
    <?php else : ?>
      <tr>
        <td colspan="4" class="text-center">No Special Overtime Credits</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>
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

<script src="<?php echo base_url('js/regularOTCheckbox.js'); ?>"></script>
<script src="<?php echo base_url('js/restDayOTCheckbox.js'); ?>"></script>
<script src="<?php echo base_url('js/specialOTCheckbox.js'); ?>"></script>
