<?php 
class Dashboard extends Controller{

    public $model_dashboard;
    public $data=[];

    public function __construct()
    {
        $this->model_dashboard=$this->model('DashboardModel');
    }

    public function index(){
        // check auth
        $this->auth('RequireAuth');
        // end
        $this->data['sub_main']['']='';
        $this->data['page_title']='Trang tổng quan';
        // Path view
        $this->data['main'] = 'admin/pages/dashboard/index';
        // Path layouts default
        $this->render('admin/layouts/default',$this->data);
        
    }

}
?>