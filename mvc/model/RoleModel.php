<?php 
class RoleModel extends Model{
    public function getRoles(){
        $sql = "SELECT * FROM roles WHERE is_deleted = 'False'";
        $query = $this->db->query($sql);
        if ($query->rowCount() > 0) {
            $roles = $query->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $res= new Response();
            $res->redirect("admin/auth/login");
            exit;
        }
        return $roles;
    }
    public function updatePermissions($permissions){
        $decodedText = html_entity_decode($permissions);
        $roleArrays = json_decode($decodedText, true);
        foreach ($roleArrays as $data) {
            $roleId = (int)$data['id'];
            $permissions = json_encode($data['permissions']);

            $sql = "UPDATE roles SET 
            permission = '" . $permissions . "'
            WHERE role_id = " . $roleId .";";
            $query = $this->db->query($sql);
            if ($query) {
                echo "OK";
            }else {
                return false;
            }
            
        }
    }
}

?>