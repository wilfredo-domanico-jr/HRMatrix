<?= $this->extend('layout/main-layout/authenticated') ?>


<?= $this->section('content') ?>


<style>
    /* Calendar container */
    .calendar {
        border: 1px solid #ddd;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    
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
        font-size: 0.6rem;

    }

    .calendar-dates div {
        padding: 10px;
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
    <div class="row" style="height: 10rem;" class="bg-success">
        <div class="col-12 mb-4">
            <div class="row">

                <div class="col-8 h-full">
                    <div class="d-flex flex-column gap-4">

                        <div class="bg-primary p-4 rounded text-white w-100">
                            <h3>Welcome, <?= session()->get('name'); ?>!</h3>
                            <h5>You have 5 pending task, lets see what you can do today!</h5>
                            <button class="btn btn-success">Check Now</button>
                        </div>

                        <div class="row">

                            <div class="col-3">
                                <div class="p-2 rounded bg-white d-flex gap-2 justify-content-evenly align-items-center">

                                    <div class="d-flex flex-column">
                                        <span class="text-secondary">Total Employee</span>
                                        <span class="h3"><?= $employeeCount ?></span>
                                    </div>

                                    <div class="d-flex justify-content-center p-2">
                                        <i class="h5 fas fa-users text-primary"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="p-2 rounded bg-white d-flex gap-2 justify-content-evenly align-items-center">

                                    <div class="d-flex flex-column">
                                        <span class="text-secondary">Total Department</span>
                                        <span class="h3"><?= $departmentCount ?></span>
                                    </div>

                                    <div class="d-flex justify-content-center p-2">
                                        <i class="h5 fas fa-users text-danger"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="p-2 rounded bg-white d-flex gap-2 justify-content-evenly align-items-center">

                                    <div class="d-flex flex-column">
                                        <span class="text-secondary">Total Request</span>
                                        <span class="h3"><?= $requestCount ?></span>
                                    </div>

                                    <div class="d-flex justify-content-center p-2">
                                        <i class="h5 fas fa-users text-success"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="p-2 rounded bg-white d-flex gap-2 justify-content-evenly align-items-center">

                                    <div class="d-flex flex-column">
                                        <span class="text-secondary">Active Users</span>
                                        <span class="h3"><?= $activeCount ?></span>
                                    </div>

                                    <div class="d-flex justify-content-center p-2">
                                        <i class="h5 fas fa-users text-warning"></i>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-6">
                                <div class="bg-white p-4 rounded h-100">
                                    <h6 class="text-secondary">Request Created Per Department</h6>
                                    <div id="request_per_dept" class="w-100 h-100"></div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="bg-white p-4 rounded h-100">
                                    <h6 class="text-secondary mb-4">Top 5 High Performing Employee</h6>

                                    <?php
                                    for ($x = 1; $x <= 5; $x++) {

                                    ?>

                                        <div class="d-flex gap-4 align-items-center mb-1">
                                            <div class="w-75 d-flex gap-4  align-items-center">
                                                <img src="<?= base_url('images/HRMatrixLogo.png'); ?>" alt="Profile Picture" class="avatar">
                                                <span><?= session()->get('name'); ?></span>
                                            </div>

                                            <span class="text-secondary text-nowrap w-25 text-truncate">DEPT-00001</span>
                                        </div>


                                    <?php
                                    }

                                    ?>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <div class="col-4 h-auto">
                    <div class="d-flex flex-col h-100">
                        <div class="rounded w-100 bg-white p-4 ">
                            <div class="calendar h-auto">
                                <!-- Month and Year Header -->
                                <div class="bg-primary text-white text-center fw-bold "><?= date('F Y') ?></div>

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

                            <div class="mb-4 w-100 h-auto">
                                <div id="new_employee_per_year" class="w-100 h-100 text-center"></div>
                            </div>

                            
                        </div>


                    </div>
                </div>

            </div>
        </div>

        <div class="col-12">
            <div class="row">

                <div class="col-8">
                    <div class="bg-secondary rounded">
                        <h1>Test</h1>
                    </div>
                </div>

                <div class="col-4">
                    <div class="bg-secondary rounded">
                        <h1>Test</h1>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>

<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });


    google.charts.setOnLoadCallback(drawRequestPerDepartmentChart);


    function drawRequestPerDepartmentChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
            <?php
            if (!empty($requestPerDept)) {
                foreach ($requestPerDept as $deptReq) {
                    // Escape the department name to handle special characters
                    $deptName = json_encode($deptReq['DEPT_NAME']);
                    $totalCount = (int)$deptReq['total_count']; // Ensure it's an integer
                    $rows[] = "[$deptName, $totalCount]";
                }

                // Join the rows with commas
                echo implode(", ", $rows);
            }

            ?>

        ]);

        // Set chart options
        var options = {
            // 'title': 'Request Created Per Department',
        };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('request_per_dept'));
        chart.draw(data, options);
    }



    google.charts.setOnLoadCallback(drawNewEmployeesPerYear);



    function drawNewEmployeesPerYear() {

        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('new_employee_per_year'));

        chart.draw(data, options);
    }
</script>


<?= $this->endSection() ?>