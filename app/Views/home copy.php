<?= $this->extend('layout/main-layout/authenticated') ?>


<?= $this->section('content') ?>


<style>
    /* Calendar container */
    .calendar {
        border: 1px solid #ddd;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Calendar header styling */
    /* .calendar-header {
            text-align: center;
            background-color: #007bff;
            color: white;
            padding: 10px;
            font-size: 1.2em;
            font-weight: bold;
        } */

    /* Days of the week styling */
    .calendar-days {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        background-color: #007bff;
        color: white;
    }

    .calendar-days div {
        padding: 10px;
        text-align: center;
        font-weight: bold;
    }

    /* Date cells styling */
    .calendar-dates {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
    }

    .calendar-dates div {
        padding: 20px;
        text-align: center;
        border: 1px solid #ddd;
    }

    /* Highlight today */
    .today {
        background-color: #ffdd57;
        font-weight: bold;
    }
</style>
<div class="page-title">
    <h1 class="text-primary">Dashboard</h1>
</div>


<div class="my-4">

    <div class="row mb-4">
        <div class="col-8 bg-primary p-4 rounded text-white">
            <h3>Welcome, Name!</h3>
            <h5>You have 5 pending task, lets see what you can do today!</h5>
            <button class="btn btn-success">Check Now</button>
        </div>

        <div class="col-4 rounded">
            <div class="calendar">
                <!-- Month and Year Header -->
                <div class="bg-primary text-white text-center p-2 fw-bold "><?= date('F Y') ?></div>

                <!-- Days of the Week -->
                <div class="calendar-days">
                    <div>Sun</div>
                    <div>Mon</div>
                    <div>Tue</div>
                    <div>Wed</div>
                    <div>Thu</div>
                    <div>Fri</div>
                    <div>Sat</div>
                </div>

                <!-- Calendar Dates -->
                <div class="calendar-dates">
                    <?php
                    // Get the current month and year
                    $now = new DateTime();
                    $year = $now->format('Y');
                    $month = $now->format('m');

                    // Get the first day of the month
                    $firstDayOfMonth = new DateTime("$year-$month-01");
                    $firstDayOfWeek = $firstDayOfMonth->format('w'); // Day of the week for the 1st of the month

                    // Blank spaces for days before the month starts
                    for ($i = 0; $i < $firstDayOfWeek; $i++) {
                        echo '<div></div>'; // Empty divs for blank spaces
                    }

                    // Loop through the days of the month
                    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                    for ($day = 1; $day <= $daysInMonth; $day++) {
                        $dateString = sprintf('%04d-%02d-%02d', $year, $month, $day);
                        $date = new DateTime($dateString);
                        $dayOfWeek = $date->format('w');

                        // Check if the date is today
                        $isToday = $date->format('Y-m-d') === $now->format('Y-m-d') ? 'today' : '';

                        // Output the date
                        echo "<div class='$isToday'>$day</div>";
                    }
                    ?>
                </div>


            </div>
        </div>

         

    </div>

</div>


        <?= $this->endSection() ?>