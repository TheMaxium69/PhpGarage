<?php
/**
 * * fonction de redirection de l'url passé en parmametre
 * @param string
 *
 */

function redirect(string $url): void
{
    header('Location: ' . $url);
}

/**
 * fonction de affichage
 * @param string //url du dossier template php
 *@param array //tableau de donnée compressé avec la methode compact()
 *
 */
function render(string $template, array $donnees): void
{
    extract($donnees);
    ob_start();

    require_once 'templates/' . $template . '.html.php';

    $contenuDeLaPage = ob_get_clean();

    require_once 'templates/layout.html.php';
}
?>
