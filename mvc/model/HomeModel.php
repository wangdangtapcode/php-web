<?php 
    class HomeModel extends Model{

        public function getFeatureProducts(){
            $sql = "SELECT * FROM comics WHERE featured = '1' AND isDelete = 'False' AND status ='active' LIMIT 4";
            $query = $this->db->query($sql);
            if (!empty($query)) {
                $products = $query->fetchAll(PDO::FETCH_ASSOC);
            } else {
                echo "Lỗi lấy sản phẩm";
            }
            return $products;
        }
        public function getOPProducts(){
            $sql = "SELECT * FROM comics WHERE LOWER(title) LIKE LOWER('%OnePiece%') AND isDelete = 'False' AND status ='active' LIMIT 4";
            $query = $this->db->query($sql);
            if (!empty($query)) {
                $products = $query->fetchAll(PDO::FETCH_ASSOC);
            } else {
                echo "Lỗi lấy sản phẩm";
            }
            return $products;
        }
        public function getNarutoProducts(){
            $sql = "SELECT * FROM comics WHERE LOWER(title) LIKE LOWER('%Naruto%') AND isDelete = 'False' AND status ='active' LIMIT 4";
            $query = $this->db->query($sql);
            if (!empty($query)) {
                $products = $query->fetchAll(PDO::FETCH_ASSOC);
            } else {
                echo "Lỗi lấy sản phẩm";
            }
            return $products;
        }
        public function getDBProducts(){
            $sql = "SELECT * FROM comics WHERE LOWER(title) LIKE LOWER('%DragonBall%') AND isDelete = 'False' AND status ='active' LIMIT 4";
            $query = $this->db->query($sql);
            if (!empty($query)) {
                $products = $query->fetchAll(PDO::FETCH_ASSOC);
            } else {
                echo "Lỗi lấy sản phẩm";
            }
            return $products;
        }
    }
?>