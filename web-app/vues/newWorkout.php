<?php
if (!ISSET($_SESSION)) { 
    session_start();
}
// Defining variables
$name = "";
$repetition1 = "";
$nbSeries = "1";
$actionInsertNewExercise = "insertNewExerciseAction";

// Validating if there are previous informations 
if (ISSET($_REQUEST["idWorkout"])) {
    $idWorkout=$_REQUEST["idWorkout"];
}

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
                                <select class="form-control" id="sel1" name="name" value="<?=$name?>">
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
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr id="exerciseList">
                                        <td>
                                            <!-- Add a row -->
                                            <button type="button" class="btn btn-primary" id="addExercise">+</button>
                                        </td>
                                        <!-- Select the nomber of repetitions done for the Serial -->
                                        <td>
                                            <div class="form-group">
                                                <input type="text" id="rep1" name="repetition1" value="<?=$repetition1?>" class="form-control" placeholder="Number of repetition"/>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                            <input id="nbSeries" value="<?=$nbSeries?>" name="nbSeries" type="hidden"/>
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
        var numRep = 2;
        $("#addExercise").click(function(){
            $("#exerciseList").append('<td><div class="form-group"><input type="text" id="rep'+numRep+'" name="repetition'+numRep+'" class="form-control" placeholder="Number of repetition"/></div></td>');
            $("#exerciseListHeader").append('<th></th>');
            // Change the value of the nbSeries param
            $("#nbSeries").val("numRep");
            numRep++;
        });
    });
</script>