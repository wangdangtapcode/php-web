<?php 
class Home extends Controller{

    public $model_home;
    public $data=[];
    public function __construct()
    {
        $this->model_home=$this->model('HomeModel');
    }

    public function index(){


        $featureProducts= $this->model_home->getFeatureProducts();

        $this->data['sub_main']['featureProducts']=$featureProducts;
        $this->data['sub_main']['OP_Products']= $this->model_home->getOPProducts();
        $this->data['sub_main']['Naruto_Products']=$this->model_home->getNarutoProducts();
        $this->data['sub_main']['DB_Products']=$this->model_home->getDBProducts();


        $this->data['page_title']='Trang chủ';
        $this->data['main'] = 'client/pages/home/index';


        $this->render('client/layouts/default',$this->data);
    }

}
?>