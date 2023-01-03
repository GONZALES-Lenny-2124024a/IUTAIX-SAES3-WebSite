<!DOCTYPE html>
<html>
    <head>
        <title>Modifications/ajouter des questions</title>
    </head>
    <body>
        <form action="../Html/navBar.html">
            <input type="submit" value="Accueil">
        </form>
        <a href="../App/downloadApp.php">
            <input type="submit" value="Télécharger l'App?">
        </a>
        <?php
        require("./connectionSQL.php");
        $modify ="";
        ?>
        <div class="tabla-responsive">
        <table class="table-bordered">
            <thead>
                <tr class="column">
                    <th>Id</th>
                    <th>Module</th>
                    <th>Question</th>
                    <th>Réponse question</th>
                    <th>Réponse 1</th>
                    <th>Réponse 2</th>
                    <th>Réponse 3</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM qcm_fr";
                $result = pg_query($con, $query);
                while($row = pg_fetch_assoc($result)){
                    ?>
                    <tr class="Rows">
                        <td><?php echo $row['id']; ?></td>&nbsp;
                        <td><?php echo $row['module']; ?></td>&nbsp;
                        <td><?php echo $row['question']; ?></td>&nbsp;
                        <td><?php echo $row['true_answer']; ?></td>&nbsp;
                        <td><?php echo $row['answer_1']; ?></td>&nbsp;
                        <td><?php echo $row['answer_2']; ?></td>&nbsp;
                        <td><?php echo $row['answer_3']; ?></td>&nbsp;
                        <td><a href="scenario.php?modify=<?php echo $row['id'] ?>" class="Mbutton"> Modifier</a></td>&nbsp;
                        <td><a href="scenario.php?delete=<?php echo $row['id'] ?>" class="delete">Supprimer</a></td>&nbsp;
                        <br>
                        
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        </div>
        <br>
        <br>
        <br>
        <?php
        //Supprimer les questions
        if(isset($_GET['delete'])){
            $id=$_GET['delete'];
            $sql="DELETE FROM QCM_FR WHERE ID='$id'";
            $query=pg_query($sql);
            if($query){
                echo "Supprimer avec succes.";
                header("refresh:0; url=scenario.php");
            }else{
                echo "ça n'a pas été supprimé.";
                header("refresh:0; url=scenario.php");
            }
        }

                    //Modifier les questions
                    if(isset($_POST['modify'])){
                        $id = $_POST['id'];
                        $module = $_POST['module'];
                        $question = $_POST['question'];
                        $true_answer = $_POST['true_answer'];
                        $answer_1 = $_POST['answer_1'];
                        $answer_2 = $_POST['answer_2'];
                        $answer_3 = $_POST['answer_3'];
                
                        $query = "UPDATE qcm_fr SET module='$module', question='$question', true_answer='$true_answer', answer_1='$answer_1', answer_2='$answer_2', answer_3='$answer_3' WHERE id='$id'";
                        $q = pg_query($con, $query);
                        if($q)
                        {
                            echo "modification successful";
                        }else{
                            echo "modification unsuccessful";
                            header("refresh:0; url=scenario.php");
                        }
                    }

                    if(isset($_GET['modify'])){
                        $modify = $_GET['modify'];
                        $q = "SELECT * FROM qcm_fr WHERE id='$modify'";
                        $query = pg_query($con, $q);
                        $row = pg_fetch_assoc($query);
                        ?>
                        <form action="scenario.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <div class="form-group">
                                <label for="module">Module:</label>
                                <input type="text" class="form-control" id="module" name="module" value="<?php echo $row['module']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="question">Question:</label>
                                <input type="text" class="form-control" id="question" name="question" value="<?php echo $row['question']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="true_answer">Réponse vraie:</label>
                                <input type="text" class="form-control" id="true_answer" name="true_answer" value="<?php echo $row['true_answer']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="answer_1">Réponse 1:</label>
                                <input type="text" class="form-control" id="answer_1" name="answer_1" value="<?php echo $row['answer_1']; ?>">
                            </div>
                            <div class="form-group">
                <label for="answer_2">Réponse 2:</label>
                <input type="text" class="form-control" id="answer_2" name="answer_2" value="<?php echo $row['answer_2']; ?>">
            </div>
            <div class="form-group">
                <label for="answer_3">Réponse 3:</label>
                <input type="text" class="form-control" id="answer_3" name="answer_3" value="<?php echo $row['answer_3']; ?>">
            </div>
            <button type="submit" name="modify" class="btn btn-primary">Modifier</button>
        </form>
        <?php
    }
    ?>
</body>
</html>