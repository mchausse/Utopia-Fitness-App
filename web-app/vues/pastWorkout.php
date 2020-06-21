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
            <h4>This week's exercises</h4>
            <hr />
            <?php
            if (ISSET($_REQUEST['thisWeekExercise'])) {
                showExercises($_REQUEST['thisWeekExercise']);
            }
            ?>

            
            <?php
            if (ISSET($_REQUEST['lastTwoWeeksExercise'])) {
                ?>
                <br />
                <h4>Last two week's exercises</h4>
                <hr />
                <?php
                showExercises($_REQUEST['lastTwoWeeksExercise']);
            }
            ?>

            <?php
            if (ISSET($_REQUEST['moreThanTwoWeeksExercise'])) {
                ?>
                <br />
                <h4>More than two week's exercises</h4>
                <hr />
                <?php
                showExercises($_REQUEST['moreThanTwoWeeksExercise']);
            } else {
                ?>
                <br />
                <h4>No exercises past the last two week</h4>
                <hr />
                <?php
            }
            ?>
        </div>
    </div>
</div>

<?php
function showExercises($exercises) {
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