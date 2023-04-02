<?php
echo "
<section class='footer' id='footer'>
    <div class='box-container'>
        <div class='box'>
            <h3>Liens rapides</h3>
            <a href='/home'><i class='fas fa-chevron-right'></i>Accueil</a>
            ";
if ((Session::check()) && (Session::getSession()['user_status'] !== 'Student')) {
    echo "<a href='/stories'><i class='fas fa-chevron-right'></i>Histoires</a>";
}
else{
    echo"<a href='/account'><i class='fas fa-chevron-right'></i>Connexion</a>";
};
echo " 

            <a href='/home/mentionsLegales'> <i class='fas fa-chevron-right'></i> Mentions légales & conditions générales</a>
        </div>


        <div class='box'>
            <h3>Application</h3>";

if (Session::check()) {
    echo "<a href='https://drive.google.com/drive/folders/1smzKLmY_qy_zYplnTqUyGFfzrvJ9mM_s?usp=share_link'> <i class='fas fa-chevron-right'></i>Télécharger NetWork Stories sur MacOS</a>";
    echo "<a href='https://drive.google.com/drive/folders/1382cDS7G-8YoMpRaqOeQbOafJ9vX_xa1?usp=share_link'> <i class='fas fa-chevron-right'></i>Télécharger NetWork Stories sur Windows</a>";
} else {
    echo "<a href='/account'> <i class='fas fa-chevron-right'></i>Télécharger NetWork Stories sur MacOS</a>";
    echo "<a href='/account'> <i class='fas fa-chevron-right'></i>Télécharger NetWork Stories sur Windows</a>";
}

echo "
        </div>

        <div class='box'>
            <h3>Contact</h3>
            <a><i class='fas fa-envelope'></i>nwstories.contact@gmail.com</a>
            <a><i class='fas fa-map-marker-alt'></i>Aix-en-Provence, France</a>
        </div>

    </div>


    <div class='credit'>Copyright © 2022 NetWork Stories | tous droits réservés
    </div>
</section>";