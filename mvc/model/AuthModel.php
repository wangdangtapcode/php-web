<?php 
class AuthModel extends Model{
    public function checkLogin($data){
        $sql = "SELECT * FROM users WHERE username ='".$data['username']."' AND is_deleted = 'False'";
        $query = $this->db->query($sql);
        if ($query->rowCount() > 0) {
            $user = $query->fetch(PDO::FETCH_ASSOC);
        } else {
            $res= new Response();
            $res->redirect("admin/auth/login");
            exit;
        }
        return $user;
    }
    public function searchRole($id){
        $sql = "SELECT * FROM roles WHERE role_id ='".$id."' AND is_deleted = 'False'";
        $query = $this->db->query($sql);
        if ($query->rowCount() > 0) {
            $role = $query->fetch(PDO::FETCH_ASSOC);
            $role['permission'] = json_decode($role['permission'],true);
        } else {
            echo "Lỗi lấy Role của account";
            exit;
        }
        return $role;       
    }
}

?>