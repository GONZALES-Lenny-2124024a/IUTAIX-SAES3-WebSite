<?php

echo "<details class='stories-details'>
        <summary>Ajouter une question à réponse écrite</summary>
        <form class='default-form stories-add-form' action='/stories/insertWrittenResponseQuestion' method='post'>
            Module: <input type='text' name='module' required><br>
            Description: <input type='text' name='description' required><br>
            Question: <input type='text' name='question' required><br>
            Réponse vraie Ecrite: <input type='text' name='true_answer' required><br>
            <input type='submit' name='add' value='Ajouter'>
        </form>
      </details>";