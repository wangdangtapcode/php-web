<?php
class Product extends Controller{
    public $model_product;
    public $data=[];
    private $limitItemDefault;
    function __construct()
    {
        $this->model_product=$this->model('ProductModel');
        if (!isset($_SESSION['limitItemDefault'])) {
            $_SESSION['limitItemDefault'] = 5;
        }
        $this->limitItemDefault = $_SESSION['limitItemDefault'];
    }
    function index(){
        // check auth
        $this->auth('RequireAuth');
        // end

        $condition['isDelete']='False';
        $pagination['limit']=$this->limitItemDefault;
        $pagination['currentPage']=1;
        
        if(isset($_SERVER['REQUEST_METHOD'])){
            $methodd=new Request();
            $datanew=$methodd->getDatas();
            if(!empty($datanew['keyword'])){
                $condition['keyword']=$datanew['keyword'];
            }
            if(!empty($datanew['page'])){
                $pagination['currentPage']=$datanew['page'];
            }

        }


        $pagination['productStart']=($pagination['currentPage']-1)*$pagination['limit'];
        $pagination['countProduct'] = $this->model_product->getCountProducts($condition);
        
        $pagination['totalPage']= ceil($pagination['countProduct']/$pagination['limit']);

        $this->data['sub_main']['products']=$this->model_product->getProducts($condition,$pagination);

        // Trả biến về view
        if(!empty($condition['keyword'])){
            $this->data['sub_main']['keyword']=$condition['keyword'];
        }
        $this->data['sub_main']['pagination'] = $pagination;
        $this->data['page_title']='Trang Sản phẩm';
        // Path view
        $this->data['main'] = 'admin/pages/product/index';
        // Path layouts default
        $this->render('admin/layouts/default',$this->data);


        
    }

    function change_status($status,$id){

        $this->model_product->updateStatus($id,$status);
        // rediret back
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    function change_feature($feature,$id){
        $feature = $feature == 'unfeature'?'0':'1';
        $this->model_product->updateFeature($id,$feature);
        // rediret back
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    function delete($id){

        $this->model_product->deleteItem($id);
        // rediret back
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    function change_limit($value){

        $_SESSION['limitItemDefault'] = $value;
        // rediret back
        header('Location: ' . $_SERVER['HTTP_REFERER']);          
    }
    function create(){
        $this->data['sub_main']['']='';

        $this->data['page_title']='Thêm sản phẩm';
        // Path view
        $this->data['main'] = 'admin/pages/product/create';
        // Path layouts default
        $this->render('admin/layouts/default',$this->data);
    }
    function create_done(){
        $req = new Request();
        $data = $req->getDatas();
        $data['price'] = (float) $data['price'];
        $this->model_product-> createItem($data);

        $res = new Response();
        $res->redirect('admin/product/index');
    }
    function detail($id){
        $datas = $this->model_product->getDetail($id);
        $this->data['sub_main']['product']=$datas;
        
        $this->data['page_title']='Chi tiết sản phẩm';
        // Path view
        $this->data['main'] = 'admin/pages/product/detail';
        // Path layouts default
        $this->render('admin/layouts/default',$this->data);
    }
    function edit($id){

        $datas = $this->model_product->getDetail($id);
        $this->data['sub_main']['product']=$datas;

        $this->data['page_title']='Thay đổi sản phẩm';
        // Path view
        $this->data['main'] = 'admin/pages/product/edit';
        // Path layouts default
        $this->render('admin/layouts/default',$this->data);
    }
    function edit_done($id){
        $req = new Request();
        $data = $req->getDatas();
        $data['price'] = (float) $data['price'];
        $this->model_product-> updateItem($data,$id);

        $res = new Response();
        $res->redirect('admin/product/index');
    }
}

?>