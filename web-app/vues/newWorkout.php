<?php
// Defining variables
$idWorkout = 0;
$name = "";
$nbSeries = 0;
$repetition1 = "";
$repetition2 = "";
$repetition3 = "";
$actionInsertNewExercise = "insertNewExerciseAction";

// Validating if there are previous informations 
if (ISSET($_REQUEST["idWorkout"]))$workout=$_REQUEST["idWorkout"];

?>
<div id="workouts">
    <!-- Tab labels -->
    <ul class="nav nav-tabs nav-justified">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="?action=newWorkoutAction">New Workout</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="?action=pastWorkoutAction">Past Workout</a>
        </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">

        <div id="newExercises">

            <div class="card">
                <div class="card-header">
                    <a class="card-link" data-toggle="collapse" href="#collapseOne">
                    Exercise #1
                    </a>
                </div>

                <!-- Details of the exercise -->
                <div id="collapseOne" class="collapse show" data-parent="#newExercises">
                    <div class="card-body">
                        <form action="" method="post">
                                
                            <!-- Name input -->
                            <div class="form-group">
                                <label for="sel1">Select exercise:</label>
                                <select class="form-control" id="sel1" value="<?=$name?>">
                                    <option value="push up">Push up</option>
                                    <option value="Jumping Jack">Jumping Jack</option>
                                    <option value="Sit up">Sit up</option>
                                    <option value="Biceps">Biceps</option>
                                </select>
                            </div>
                            
                            <!-- Serials and Repetitions -->
                            <table class="table table-striped">
                                <thead>
                                    <tr id="exerciseListHeader">
                                        <th>
                                            Series
                                            <!-- Add a row -->
                                            <button type="button" class="btn btn-primary" id="addExercise">+</button>
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr id="exerciseList">
                                        <!-- Select the nomber of repetitions done for the Serial -->
                                        <td>
                                            <div class="form-group">
                                                <input type="text" id="rep1" name="repetition1" value="<?=$repetition1?>" class="form-control" placeholder="Number of repetition"/>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" id="rep2" name="repetition2" value="<?=$repetition2?>" class="form-control" placeholder="Number of repetition"/>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" id="rep3" name="repetition3" value="<?=$repetition3?>" class="form-control" placeholder="Number of repetition"/>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                            <!-- Secret field for the name of the action -->
                            <input name="action" value="<?=$actionInsertNewExercise?>" type="hidden"/>
                            <!-- Submit the exercise -->
                            <input type="submit" class="btn btn-info" value="Done!">
                        <form>

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<script>
    $(document).ready(function(){
        $("#addExercise").click(function(){
            $("#exerciseList").append('<td><div class="form-group"><input type="text" id="rep"  class="form-control" placeholder="Number of repetition"/></div></td>');
            $("#exerciseListHeader").append('<th></th>');
        });
    });
</script>