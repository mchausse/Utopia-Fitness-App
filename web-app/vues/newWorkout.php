<?php
if (!ISSET($_SESSION)) { 
    session_start();
}
?>
<link rel="stylesheet" href="./css/newWorkout.css" type="text/css" />
<div id="workouts">
    <!-- Tab labels -->
    <ul class="nav nav-tabs nav-justified">
        <li class="nav-item">
            <a class="nav-link active" href="?action=newWorkoutAction">New Workout</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?action=pastWorkoutAction">Past Workout</a>
        </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div id="newExercises">

            <?php
            include_once('vues/form/newExercise.php');
            
            // If we come from inserting a new action
            if (ISSET($_REQUEST["newExercise"])) {
                $names = $_SESSION["newExerciseNames"];
                // Add a new form for each completed exercises
                for($i=$_REQUEST["newExercise"]; $i > 0; $i--) {
                    ?>

                    <div class="card">
                        <div class="card-header">
                             <span>
                                <a class="card-link" data-toggle="collapse" href="#collapseOne">Exercise #<?=$i?></a>
                                - <?=$names[$i - 1]?>
                                <i class="fa fa-check-square" style="font-size:24px;color:green;position:absolute;right:10px;"></i>
                            </span>
                        </div>
                    </div>

                    <?php
                }
            }
            ?>

        </div>
    </div>
</div>