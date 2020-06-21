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
            <span class="pastExercisesTitle">This week's exercises</span>
            <hr />
            <?php
            if (ISSET($_REQUEST['thisWeekExercise'])) {
                showExercises($_REQUEST['thisWeekExercise']);
            }

            if (ISSET($_REQUEST['lastTwoWeeksExercise'])) {
                ?>
                <br />
                <span class="pastExercisesTitle">Last two week's exercises</span >
                <hr />
                <?php
                showExercises($_REQUEST['lastTwoWeeksExercise']);
            }
            
            if (ISSET($_REQUEST['moreThanTwoWeeksExercise'])) {
                ?>
                <br />
                <span  class="pastExercisesTitle">More than two week's exercises</span >
                <hr />
                <?php
                showExercises($_REQUEST['moreThanTwoWeeksExercise']);
            } else {
                ?>
                <br />
                <span  class="pastExercisesTitle">No exercises past the last two week</span >
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

        <div class="card exerciseCard" class="collapse">
            <div class="card-header">
                <a class="card-link" data-toggle="collapse" href="#exercise<?=$exercise->getId()?>"><?=$exercise->getName()?></a>
                - <?=$exercise->getDate()?>
            </div>
            <div id="exercise<?=$exercise->getId()?>" data-parent="#pastExercises" class="collapse">
                <div class="card-body">
                    
                    <!-- Series and Repetitions -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    <?=$exercise->getNbSeries()?> series
                                </th>
                                
                                <?php
                                // Add the same number of header than series to fit with the number of td
                                for($ii = 1; $ii < $exercise->getNbSeries(); $ii++) {
                                    ?>
                                    <th></th>
                                    <?php
                                }
                                ?>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <?php
                                for($ii = 0; $ii < $exercise->getNbSeries(); $ii++) {
                                    $repetition = explode("/", $exercise->getRepetitions())
                                    ?>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" value="<?=$repetition[$ii]?>" class="form-control" disabled="disabled"/>
                                        </div>
                                    </td>
                                    <?php
                                }
                                ?>
                            </tr>
                        </tbody>

                    </table>

                </div>
            </div>
        </div>

        <?php
    }
}
?>