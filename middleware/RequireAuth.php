<?php 
if(!isset($_SESSION['token'])){
    $res = new Response();
    $res->redirect('admin/auth/login');
}else{
    $model_required = new Database();
    $_SESSION['account'] = $model_required->searchUser($_SESSION['token']);;
    $_SESSION['account_role'] = $model_required->searchRole($_SESSION['account']['role_id']);
}
?>