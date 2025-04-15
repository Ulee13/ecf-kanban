<?php 
namespace kanban;
require '/var/www/html/vendor/autoload.php';
use kanban\controller\KanbanCntrl;
use kanban\controller\AjaxCntrl;

$uri = $_SERVER['REQUEST_URI'];
$route = explode('?', $uri)[0]; // on enlève la partie après le ?
//echo $route;
$method = $_SERVER['REQUEST_METHOD']; // on récupère la méthode HTTP (GET, POST, PUT, DELETE, etc.)
//echo $route . "--------------" . $method;

if (file_exists("./config/param.ini")) {
    $param = parse_ini_file("./config/param.ini", true);
    extract($param['WEBAPP']);
    // extract du tag [WEBAPP] et génère les variables $webapp_root ... du nom donne dans param.ini
    define('WEBAPP_ROOT', $webapp_root);
    define('WEBAPP_PUBLIC', $webapp_public);
    //define('WEBAPP_VIEW', $webapp_view);
}
$cntrl = new KanbanCntrl();

if ($method == 'GET') {
    match($route) {
        $webapp_root                            => $cntrl->getIndex(),
        $webapp_root . '/'                      => $cntrl->getIndex(),
        $webapp_root . '/scr/index.php'         => $cntrl->getIndex(),
        $webapp_root . '/addProjet'             => $cntrl->formProjet(),
        $webapp_root . '/addUser'               => $cntrl->formUser(),
        $webapp_root . '/addPlan'               => $cntrl->formPlan(),
        $webapp_root . '/addMess'               => $cntrl->formMess(),
        $webapp_root . '/addDoc'                => $cntrl->formDoc(),
        $webapp_root . '/addCal'                => $cntrl->formCal(),
        $webapp_root . '/saveSupProjet'         => $cntrl->saveSupProjet(),
        $webapp_root . '/cancelSupProjet'       => $cntrl->cancelSupProjet(),
        $webapp_root . '/getSupProjet'         => $cntrl->getSupProjet(),
        // $webapp_root . '/categories'            => $cntrl->getCategories(),
        // $webapp_root . '/plats'                 => $cntrl->getPlats(),
        // $webapp_root . '/formplat'              => $cntrl->formPlat(),
        // $webapp_root . '/formcategorie'         => $cntrl->formCategorie(),
        // $webapp_root . '/removeplat'            => $cntrl->removePlat(),
        // $webapp_root . '/removecategorie'       => $cntrl->removeCategorie(),
        default                                 => $cntrl->getIndex()
    };
} else if ($method == 'POST') {
    match($route) {
        // $webapp_root . '/addPlat'               => $cntrl->addPlat(),
        // $webapp_root . '/addCategorie'          => $cntrl->addCategorie(),
        default                                 => $cntrl->getIndex()
    };
} else {
    // Gérer d'autres méthodes HTTP si nécessaire
    http_response_code(405); // Method Not Allowed
    echo "Method not allowed";
}
?>