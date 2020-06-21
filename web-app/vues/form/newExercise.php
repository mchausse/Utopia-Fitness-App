<?php
if (!ISSET($_SESSION)) { 
    session_start();
}
// Defining variables
$name = "";
$repetition1 = "";
$nbSeries = "1";
$actionInsertNewExercise = "insertNewExerciseAction";

// Number and names form this sessions exercise
if (!ISSET($_REQUEST["newExercise"])) {
    $_REQUEST["newExercise"] = 0;
}
if (!ISSET($_SESSION["newExerciseNames"])) {
    $_SESSION["newExerciseNames"] = array();
}

// Validating if there are previous informations 
if (ISSET($_REQUEST["name"])) {
    $name=$_REQUEST["name"];
}
if (ISSET($_REQUEST["repetition1"])) {
    $repetition1=$_REQUEST["repetition1"];
}
//if (ISSET($_REQUEST["nbSeries"])) {
//    $nbSeries=$_REQUEST["nbSeries"];
//}

?>
<div class="card">
    <div class="card-header">
        <a class="card-link" data-toggle="collapse" href="#collapseOne">Exercise #<?=(ISSET($_REQUEST["newExercise"]) ? $_REQUEST["newExercise"]+1 : 1)?></a>
        <i class="fa fa-minus-square" style="font-size:24px;color:orange;position:absolute;right:10px;"></i>
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
                <input value="<?=$_REQUEST["newExercise"]?>" name="newExercise" type="hidden"/>
                <input id="nbSeries" value="<?=$nbSeries?>" name="nbSeries" type="hidden"/>
                <!-- Secret field for the name of the action -->
                <input name="action" value="<?=$actionInsertNewExercise?>" type="hidden"/>
                <!-- Submit the exercise -->
                <input type="submit" class="btn btn-info" value="Done!">
            <form>

        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var numRep = 2;
        $("#addExercise").click(function(){
            $("#exerciseList").append('<td><div class="form-group"><input type="text" id="rep'+numRep+'" name="repetition'+numRep+'" class="form-control" placeholder="Number of repetition"/></div></td>');
            $("#exerciseListHeader").append('<th></th>');
            $("#nbSeries").val(numRep);
            numRep++;
        });
    });
</script>