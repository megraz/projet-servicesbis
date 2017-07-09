<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style type="text/css">
    body{
        background-color:  #d5dac1;
        margin-top: 20px;
        margin-left: 80px;
    }
    a {
        margin-left: 15px;
    }
</style>

<?php
include_once './User.php';
include_once './DataBase.php';
$instance = new DataBase();

if (isset($_POST['pseudo']) && (isset($_POST['mdp']))) {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $pseudo = $post['pseudo'];
    $mdp = md5($post['mdp']);
    if (is_file('utilisateur/' . $pseudo . '.txt')) {
        $contenu = unserialize(file_get_contents('utilisateur/' . $pseudo . '.txt'));
        $mdp_data = $contenu->getMdp();

        if ($mdp_data == $mdp) {
            session_start();
            $_SESSION['nom'] = $pseudo;
            echo 'connecté';
            header("location:index.php"); //redirige l'utilisateur sur la pge index
        } else {
            echo 'pas connecté';
        }
    } else {
        echo 'l\'utilisateur ' . $pseudo . ' n\'existe pas';
    }
} else {
    echo 'pas de données';
}
?>
<a href="index.php">Retour</a>
