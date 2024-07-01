<?php 
class Role extends Controller{
    public $model_role;
    public $data=[];
    function __construct()
    {
        $this->model_role=$this->model('RoleModel');
    }
    function index(){
        // check auth
        $this->auth('RequireAuth');
        // end
        $roles= $this->model_role->getRoles();

        $this->data['sub_main']['roles']=$roles;
        $this->data['page_title']='Trang nhóm quyền';
        // Path view
        $this->data['main'] = 'admin/pages/role/index';
        // Path layouts default
        $this->render('admin/layouts/default',$this->data);
    }
    function permissions(){
        // check auth
        $this->auth('RequireAuth');
        // end
        $roles= $this->model_role->getRoles();
        
        $this->data['sub_main']['roles'] = $roles;

        $this->data['page_title']='Trang phân quyền';
        // Path view
        $this->data['main'] = 'admin/pages/role/permissions';
        // Path layouts default
        $this->render('admin/layouts/default',$this->data);        
    }
    function permissions_done(){
        if(isset($_SERVER['REQUEST_METHOD'])){
            $methodd=new Request();
            $datanew=$methodd->getDatas();
            $this->model_role->updatePermissions($datanew['permissions']);
            //back
            header('Location: ' . $_SERVER['HTTP_REFERER']);    
        }
    }
}

?>