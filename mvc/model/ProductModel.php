<?php
class ProductModel extends Model
{
    public function getProducts($condition, $pagination)
    {

        $products = [];
        $whereClause = '';
        foreach ($condition as $key => $value) {
            if ($key !== 'keyword' && $value !== '') {
                $whereClause .= "$key = '$value' AND ";
            }
        }
        $whereClause = rtrim($whereClause, 'AND ');

        if (!empty($condition['keyword'])) {
            $whereClause .= " AND (LOWER(title) LIKE '%" . strtolower($condition['keyword']) . "%')";
        }

        $limit = " LIMIT " . $pagination['productStart'] . ", " . $pagination['limit'] . ";";
        $whereClause .= $limit;

        $sql = "SELECT * FROM comics WHERE $whereClause";

        $query = $this->db->query($sql);
        if (!empty($query)) {
            $products = $query->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo "Lỗi lấy sản phẩm";
        }
        return $products;
    }
    public function getCountProducts($condition)
    {

        $products = [];
        $whereClause = '';
        foreach ($condition as $key => $value) {
            if ($key !== 'keyword' && $value !== '') {
                $whereClause .= "$key = '$value' AND ";
            }
        }
        $whereClause = rtrim($whereClause, 'AND ');

        if (!empty($condition['keyword'])) {
            $whereClause .= " AND (LOWER(title) LIKE '%" . strtolower($condition['keyword']) . "%')";
        }

        $sql = "SELECT * FROM comics WHERE $whereClause";

        $query = $this->db->query($sql);
        if (!empty($query)) {
            $products = $query->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo "Lỗi lấy sản phẩm";
        }
        return count($products);
    }
    public function updateStatus($id, $status)
    {
        $sql = "UPDATE comics SET status = '$status' WHERE comic_id = $id";
        $query = $this->db->query($sql);
        if ($query) {
            return true;
        }
        return false;
    }
    public function updateFeature($id, $feature)
    {
        $sql = "UPDATE comics SET featured = '$feature' WHERE comic_id = $id";
        echo $sql;
        $query = $this->db->query($sql);
        if ($query) {
            return true;
        }
        return false;
    }
    public function deleteItem($id)
    {
        $sql = "UPDATE comics SET isDelete = 'True' WHERE comic_id = $id";
        $query = $this->db->query($sql);
        if ($query) {
            return true;
        }
        return false;
    }
    public function createItem($data)
    {
        $weburl = "/public/img/";
        $data['coverImage']= $weburl . $data['coverImage'];
        $sql = "INSERT INTO comics (author_name, title, genre, description, release_date, price, cover_image_url,status,featured) 
                VALUES ('" . $data['authorName'] . "', 
                '" . $data['title'] . "', 
                '" . $data['genre'] . "', 
                '" . $data['description'] . "', 
                '" . $data['releaseDate'] . "', 
                '" . $data['price'] . "', 
                '" . $data['coverImage'] . "', 
                '" . $data['status'] . "', 
                '" . $data['featured'] . "')";
        $query = $this->db->query($sql);
        if ($query) {
            return true;
        }
        return false;
    }
    public function getDetail($id)
    {
        $sql = "SELECT * FROM comics WHERE comic_id = '$id'";
        $query = $this->db->query($sql);
        if (!empty($query)) {
            $products = $query->fetch(PDO::FETCH_ASSOC);
        } else {
            echo "Lỗi lấy sản phẩm";
        }
        return $products;
    }
    public function updateItem($data,$id)
    {
        $weburl = "/public/img/";
        if(!empty($data['coverImage'])) {
            $data['coverImage']= $weburl . $data['coverImage'];
        }else {
            $queryUrl = "SELECT cover_image_url FROM comics WHERE comic_id = ".$id;
            $curUrl = $this->db->query($queryUrl)->fetch(PDO::FETCH_ASSOC);
            $data['coverImage'] = $curUrl['cover_image_url'];
        }

        $id=(int) $id;
        $sql = "UPDATE comics SET 
                author_name = '" . $data['authorName'] . "', 
                title = '" . $data['title'] . "', 
                genre = '" . $data['genre'] . "', 
                description = '" . $data['description'] . "', 
                release_date = '" . $data['releaseDate'] . "', 
                price = '" . $data['price'] . "', 
                cover_image_url = '" . $data['coverImage'] . "',
                status = '" . $data['status'] . "',  
                featured = '" . $data['featured'] . "'
                WHERE comic_id = " . $id.";";
        $query = $this->db->query($sql);
        if ($query) {
            return true;
        }
        return false;
    }
}
