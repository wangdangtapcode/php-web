<?php 
class Database{
    private $__conn;
    function __construct()
    {
        global $config;
        $this->__conn= Connection::getInstance($config['database']);

    }
    function insert($table,$data){
        if(!empty($data)){
            $fieldStr = '';
            $valueStr= '';
            foreach($data as $key => $value){
                $fieldStr.=$key.',';
                $valueStr.="'".$value."',";
            }
            $fieldStr =rtrim($fieldStr,',');
            $valueStr = rtrim($valueStr,',');

            $sql ="INSERT INTO $table($fieldStr) VALUES ($valueStr)";
            $status = $this-> query($sql);
            if($status){
                return true;
            }
        }
        return false;
    }
    function update($table,$data, $condition =''){
        if(!empty($data)){
            $updateStr = '';
            foreach($data as $key => $value){
                $updateStr.="$key='$value',";
            }
            $updateStr =rtrim($updateStr,',');

            if(!empty($condition)){
                $sql = "UPDATE $table SET $updateStr WHERE $condition";

            }else {
                $sql = "UPDATE $table SET $updateStr";
            }
            $status = $this->query($sql);
            if($status){
                return true;
            }
        }
        return false;
    }
    function delete($table, $condition =''){
        if(!empty($condition)){
            $sql = 'DELETE FROM '.$table.'WHERE '.$condition;
        }else {
            $sql = 'DELETE FROM '.$table;
        }

        $status = $this->query($sql);

        if($status){
            return true;
        }

        return false;
    }

    function query($sql){
        try {
            $statement = $this->__conn->prepare($sql);
            $statement-> execute();
            return $statement;
        }catch(Exception $exception){
            $mess = $exception->getMessage();
            die($mess);
        }
        
    }
    function searchToken($token){
        $sql = "SELECT * FROM users WHERE token ='".$token."' AND is_deleted = 'False'";
        $query = $this->query($sql);
        if ($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
        return false;
    }

    function lastInsertId(){
        return $this->__conn->lastInsertId();
    }
    public function searchRole($id){
        $sql = "SELECT * FROM roles WHERE role_id ='".$id."' AND is_deleted = 'False'";
        $query = $this->query($sql);
        if ($query->rowCount() > 0) {
            $role = $query->fetch(PDO::FETCH_ASSOC);
            $role['permission'] = json_decode($role['permission'],true);
        } else {
            echo "Lỗi lấy Role của account";
            exit;
        }
        return $role;       
    }
    public function searchUser($token){
        $sql = "SELECT * FROM users WHERE token ='".$token."' AND is_deleted = 'False'";
        $query = $this->query($sql);
        if ($query->rowCount() > 0) {
            $user = $query->fetch(PDO::FETCH_ASSOC);
        } else {
            echo "Lỗi lấy User";
            exit;
        }
        return $user;          
    }
}


?>
