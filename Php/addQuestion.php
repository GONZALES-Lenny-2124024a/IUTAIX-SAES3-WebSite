<?php
require("./connectionSQL.php");
require("./History.php");

function addQcm($con, $id, $true_answer, $answer_1, $answer_2, $answer_3) {
    $statement="INSERT INTO qcm (id, true_answer, answer_1, answer_2, answer_3) 
    VALUES (:id, :true_answer, :answer_1, :answer_2, :answer_3);";
    $query = $con->prepare($statement);
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->bindValue(':true_answer',$true_answer,PDO::PARAM_INT);
    $query->bindValue(':answer_1',$answer_1,PDO::PARAM_STR);
    $query->bindValue(':answer_2',$answer_2,PDO::PARAM_STR);
    $query->bindValue(':answer_3',$answer_3,PDO::PARAM_STR);
    $query->execute();
}

function addWrittenResponseQuestion($con, $id, $true_answer) {
    $statement ="INSERT INTO writtenresponse (id, true_answer) VALUES (:id, :true_answer);";
    $query = $con->prepare($statement);
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->bindValue(':true_answer',$true_answer,PDO::PARAM_STR);
    $query->execute();
}

$module =  $_POST['module'] ?? null;
$description =  $_POST['description'] ?? null;
$question = $_POST['question'] ?? null;
$true_answer =  $_POST['true_answer'] ?? null;
$answer_1 =  $_POST['answer_1'] ?? null;
$answer_2 = $_POST['answer_2'] ?? null;
$answer_3 =  $_POST['answer_3'] ?? null;

addHistory($con, $module, $description, $question);
$id = getIdFromHistory($con, $module, $description, $question);

if ($answer_1 || $answer_2 || $answer_3) {
    addQcm($con, $id, $true_answer, $answer_1, $answer_2, $answer_3);
} else {
    addWrittenResponseQuestion($con, $id, $true_answer);
}

header("Location: historyPage.php");
exit();