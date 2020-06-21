<?php
if (!ISSET($_SESSION)) { 
    session_start();
}
?>
<div id="workouts">
    <!-- Tab labels -->
    <ul class="nav nav-tabs nav-justified">
        <li class="nav-item">
            <a class="nav-link" href="?action=newWorkoutAction">New Workout</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="?action=pastWorkoutAction">Past Workout</a>
        </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div id="pastExercises">
        
            <?php
            if (ISSET($_REQUEST['pastExerciseArray'])) {
                $exercises = $_REQUEST['pastExerciseArray'];
                for($i=0; $i < sizeof($exercises); $i++) {
                    $exercise = $exercises[$i];
                    ?>

                    <div class="card">
                        <div class="card-header">
                             <span>
                                <a class="card-link" data-toggle="collapse" href="#collapseOne"><?=$exercise->getName()?></a>
                                - <?=$exercise->getDate()?>
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