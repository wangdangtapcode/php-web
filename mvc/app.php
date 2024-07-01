<?php 

class App{

    private $__controller,$__action,$__params;
    private $__defaultRoute;
    function __construct()
    {
        // thư mục admin và client
        $this->__defaultRoute='client';

        // controller,action,params mặc định
        // global $routes;

        // if(!empty($routes['default_controller'])){
        //     $this->__controller = $routes['default_controller'];
        // }
        
        $this->__controller = 'home';
        $this->__action='';
        $this->__params=[];

        $this->handleUrl();
    }

    function getUrl(){
        // Lấy url ví dụ http://localhost/project-3/dashboard lấy được /dashboard
        if(!empty($_SERVER['PATH_INFO'])){
            $url=$_SERVER['PATH_INFO'];
        }else{
            $url='/';
        }
        return $url;
    }
    public function handleUrl(){
        $url=$this->getUrl();
        
        $urlArray=array_values(array_filter(explode("/",$url))); 
        //Xử lý trang admin trước
        if(!empty($urlArray)){
            if($urlArray[0]=='admin'){
                $this->__defaultRoute='admin';
                unset($urlArray[0]);
                $urlArray=array_values($urlArray);
            }
        }
        
        
        // Xử lí Controller 


        if(!empty($urlArray[0])){
            $this->__controller = ucfirst($urlArray[0]);
        }else{
            $this->__controller = ucfirst($this->__controller);
        }
        
        if(file_exists('mvc/controller/'.($this->__defaultRoute).'/'.($this->__controller).'.php')){
            require_once 'controller/'.($this->__defaultRoute).'/'.($this->__controller).'.php';

            if(class_exists($this->__controller)){
                $this->__controller = new $this->__controller();
                unset($urlArray[0]);
            }else{
                echo "Lỗi";
            }

            
        }else{
            echo "Lỗi";
        }

        // Xử lí Action 
        if(!empty($urlArray[1])){
            $this->__action = $urlArray[1];
            unset($urlArray[1]);
        }

        // Xử lí Params 
        
        $this->__params= array_values($urlArray);


        // Kiểm tra method tồn tại
        if(method_exists($this->__controller,$this->__action)){

            call_user_func_array([$this->__controller,$this->__action],$this->__params);
            
        }else {
            echo "Lỗi gọi method";
        }
    }
}

?>