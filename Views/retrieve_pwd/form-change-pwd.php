<?php
echo("<form class='sigin' method='post' action='/retrievepwd/update'>
        <label><b>Token reçu</b></label>
        <input type='text' placeholder='Token' name='token' required><br>

        <label><b>Votre mail</b></label>
        <input type='text' placeholder='Mail' name='email' required>

        <label><b>Nouveau mot de passe</b></label>
        <input type='password' placeholder='Nouveau mot de passe' name='user_password' minlength='12' required>
        
        <label><b>Confirmer le nouveau mot de passe</b></label>
        <input type='password' placeholder='Confirmer mot de passe' name='password_confirmation' minlength='12' required>
        
        <input type='submit' id='submit' value='Valider' >

    </form>");