<?php
class AjaxCntrl {
    public function loadModuleForm($moduleName) {
        $allowed = ['gestprojet', 'gestuser', 'gestplan', 'gestmess', 'gestdoc', 'gestcal']; // liste blanche

        if (in_array($moduleName, $allowed)) {
            $file = __DIR__ . '/../view/' . $moduleName . '.php';
            if (file_exists($file)) {
                include $file;
            } else {
                http_response_code(404);
                echo "Formulaire introuvable.";
            }
        } else {
            http_response_code(403);
            echo "Module non autorisé.";
        }
    }
}
