<?php
class Request
{

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
    public function isPost()
    {
        if ($this->getMethod() == 'post') {
            return true;
        }
        return false;
    }
    public function isGet()
    {
        if ($this->getMethod() == 'get') {
            return true;
        }
        return false;
    }
    public function getDatas()
    {
        $dataFields = [];

        if ($this->isGet()) {

            if (!empty($_GET)) {
                foreach ($_GET as $key => $value) {
                    $dataFields[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }
        if ($this->isPost()) {

            if (!empty($_POST)) {
                foreach ($_POST as $key => $value) {
                    $dataFields[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }

        return $dataFields;
    }
}
