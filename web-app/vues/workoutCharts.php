<?php
if (!ISSET($_SESSION)) { 
    session_start();
}

// Get the data to the chart
$chartData = $_REQUEST['chartData'];
$maxNumberOfRep = $_REQUEST['maxNumberOfRep'];
if(ISSET($_REQUEST['name'])) {
    $name = $_REQUEST['name'];
} else {
    $name = "biceps curl";
}
?>

<!-- Charts functions-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
    var data = new google.visualization.DataTable();
    var maxNumberOfRep = <?php echo $maxNumberOfRep?> + 1;
    var unsafeData = <?php echo json_encode($chartData)?>;
    var name = "<?php echo $name?>";
    var safeData = [];

    // Set the right number the column for the number of rep
    data.addColumn('number', 'Date');
    for(var i = 1; i < maxNumberOfRep; i++) {
        data.addColumn('number', 'Rep '+i);
    }

    // Validate if all the rows have the right number of row
    for(var i = 0; i < unsafeData.length; i++) {
        if(unsafeData[i].length < maxNumberOfRep) {
            // Fill the missing data with null value
            for(var ii = 0; unsafeData[i].length < maxNumberOfRep; ii++) {
                unsafeData[i].push(null);
            }
        }

        safeData.push(unsafeData[i]);
    }

    // Add the safe data
    data.addRows(safeData);

    var options = {
        title: 'Repetitions by series for '+name,
        curveType: 'function',
        legend: { position: 'bottom' },
        hAxis: {
            min: 0
        }
    };

    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

    chart.draw(data, options);
    }
</script>

<!-- CSS page -->
<link rel="stylesheet" href="./css/workoutCharts.css" type="text/css" />
<div id="workouts">
    <!-- Tab labels -->
    <ul class="nav nav-tabs nav-justified">
        <li class="nav-item">
            <a class="nav-link" href="?action=newWorkoutAction">New Workout</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?action=pastWorkoutAction">Past Workout</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="?action=workoutChartsAction">Workout Charts</a>
        </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="container-fluid">
            <!-- Data selection section -->
            <div class="row">
                <?php
                // Generate a new button for every type of exercise
                foreach($_REQUEST["exerciseNames"] as $name) {
                ?>
                    <form method="post" action="">
                        <input class="card-title" type="submit" value="<?=$name->getName()?>" name="name"></input>
                        <input type="hidden" name="idName" value="<?=$name->getId()?>"/>
                        <input type="hidden" name="action" value="workoutChartsAction"/>
                    </form>
                <?php
                }
                ?>
            </div>
            <hr>
            <div class="row">
                <?php
                // Display a message if no data
                if(sizeof($chartData) > 0) {
                    ?>
                    <!-- Diagrams section -->
                    <div id="curve_chart" style="width: 1050px; height: 600px"></div>
                    <?php
                } else {
                    ?>
                    <span  class="notEnoughData">Not enough data for this exercise... Yet!</span >
                    <?php
                }
                ?>
            </div>
        </div>

    </div>
</div>
