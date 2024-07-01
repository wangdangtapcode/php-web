<?php
class Response{
    public function redirect($uri = ''){
        $url =_WEB_ROOT.'/'.$uri;
        header("Location: ".$url);
        exit;
    }
}

?>