<?php
namespace modules\controllers;

use modules\models\user_repository_model;

class delete_account_controller
{
   public function execute(): void{
       if ($_SERVER["REQUEST_METHOD"] !== "POST") {
           http_response_code(405);
           header('Allow: POST');
           exit();
       }

       if(!isset($_SESSION["user"])){
           header('Location: login');
           exit;
       }

       if (($_POST['confirm'] ?? '') !== 'yes'){
           (new \modules\views\delete_account_view())->show();
           return;
       }
       $id = (int)$_SESSION["user"]->id;
       if (!(new user_repository_model())->delete_user($id)){
           $_SESSION['error_message'] = "Erreur lors la suppression de l'utilisateur";
           header( 'Location: /profil');
           exit;
       }

       $_SESSION = [];
       session_destroy();
       header('Location: login');
       exit;

   }
}