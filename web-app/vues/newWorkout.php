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
                        <form>
                                
                            <!-- Name input -->
                            <div class="form-group">
                                <label for="sel1">Select exercise:</label>
                                <select class="form-control" id="sel1">
                                    <option>Push up</option>
                                    <option>Jumping Jack</option>
                                    <option>Sit up</option>
                                    <option>Biceps</option>
                                </select>
                            </div>
                            
                            <!-- Serials and Repetitions -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Series</th>
                                    </tr>
                                </thead>

                                <tbody id="exerciseList">

                                    <!-- Add a Serials -->
                                    <tr>
                                        <td>
                                            <button type="button" class="btn btn-primary" id="addExercise">Add one +</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <!-- Select the nomber of repetitions done for the Serial -->
                                        <td>
                                            <div class="form-group">
                                                <label for="sel1">Number of repetition:</label>
                                                <select class="form-control" id="sel1">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                    <option>7</option>
                                                    <option>8</option>
                                                    <option>9</option>
                                                    <option>10</option>
                                                    <option>11</option>
                                                    <option>12</option>
                                                    <option>13</option>
                                                    <option>14</option>
                                                    <option>15</option>
                                                    <option>16</option>
                                                    <option>17</option>
                                                    <option>18</option>
                                                    <option>19</option>
                                                    <option>20</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <input type="submit" class="btn btn-info" value="Save">
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
            $("#exerciseList").append('<tr><td><div class="form-group"><label for="sel1">Number of repetition:</label><select class="form-control" id="sel1"><option>1</option><option>2</option><option>3</option><option>4</option></select></div></td></tr>');
        });
    });
</script>