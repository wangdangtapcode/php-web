<?php 
class Auth extends Controller{
    public $model_auth;
    public $data=[];
    function __construct()
    {
        $this->model_auth=$this->model('AuthModel');
    }
    function login(){
        if(isset($_SESSION['token'])){
            $res= new Response();
            $res->redirect('admin/dashboard/index');
        }        
        $this->data['sub_main']['']='';

        $this->data['page_title']='Đăng nhập';
        // Path view
        $this->data['main'] = 'admin/pages/auth/login';
        // Path layouts default
        $this->render('admin/layouts/auth',$this->data);
    }
    function login_done(){
        $req = new Request();
        $data = $req->getDatas();
        $user = $this->model_auth->checkLogin($data);
        if( $user && $user['password'] == $data['password']){
            if (!isset($_SESSION['token'])) {
                $_SESSION['token'] = $user['token'];
            }
            $res= new Response();
            $res->redirect("admin/dashboard/index");
        }else{
            $res= new Response();
            $res->redirect("admin/auth/login");
        }
    }
    function logout(){
        unset($_SESSION['token']);
        unset($_SESSION['account']);
        unset($_SESSION['account_role']);
        $res= new Response();
        $res->redirect("admin/auth/login");
    }
}

?>