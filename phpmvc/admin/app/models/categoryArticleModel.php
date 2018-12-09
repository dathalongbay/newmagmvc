<?php
class categoryArticleModel extends Database {

    /*
     * Biến này đã chứa kết nối đến CSDL
     */
    public $conn;

    public function __construct()
    {
        parent::__construct();
        $this->conn = self::$connection;
    }

    public function getListCategories() {

        $data = $this->getRows();
        $result = array();
        $this->recursiveCategory($data, 0, 1, $result);
        return $result;
    }

    public function getListCategoriesById($id) {
        $data = $this->getRows();
        $result = array();
        $cat = $this->getRow($id);
        $this->recursiveCategory($data, $id, $cat['level'], $result);
        return $result;
    }

    function recursiveCategory($source, $parent_id, $level, &$result) {
        if (!empty($source)) {
            foreach($source as $key => $category) {
                if ($category['parent_id'] == $parent_id) {
                    $category['level'] = $level;
                    $result[] = $category;
                    unset($source[$key]);
                    $this->recursiveCategory($source, $category['id'], $level+1,$result );
                }
            }
        }
    }

    public function getRows() {

        $data = array();
        $sql = "SELECT * FROM category_article";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    public function getRow($id) {

        $data = null;
        $sql = "SELECT * FROM category_article WHERE id=" . $id;
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }

    public function store($data) {

        if ($data['id'] > 0) {
            $new_parent_id = $data['parent_id'];

            $old_category = $this->getRow($data['id']);
            if ($old_category['parent_id'] == $new_parent_id) {
                // Khong doi danh muc cha
                // Trường hợp edit
                $sql = "UPDATE category_article SET";
                $sql .= " category_name='" . $data['category_name'] . "'";
                $sql .= " ,category_intro='" . $data['category_intro'] . "'";
                $sql .= " ,category_desc='" . $data['category_desc'] . "'";
                $sql .= " ,created='" . $data['created'] . "'";
                $sql .= " WHERE id=".$data['id'];
                echo $sql;
            } else {
                // Doi danh muc cha
                $sql = "UPDATE category_article SET";
                $sql .= " category_name='" . $data['category_name'] . "'";
                $sql .= " ,category_intro='" . $data['category_intro'] . "'";
                $sql .= " ,category_desc='" . $data['category_desc'] . "'";
                $sql .= " ,created='" . $data['created'] . "'";

                if ($new_parent_id > 0) {
                    $new_parent = $this->getRow($new_parent_id);
                    $new_level = $new_parent['level'] + 1;
                    $sql .= " ,parent_id=". $new_parent['id'];
                    $sql .= " ,level=" . $new_level . "";

                    // check doi moi cha khong duoc la chinh no va cac con chau cua no
                    if ($new_parent['id'] == $data['id']) {
                        echo 'Ban dang doi cha la chinh danh muc nay. Khong duoc doi';
                        die;
                    }

                    $except_child_id = array();
                    $tree = $this->getListCategoriesById($data['id']);
                    foreach ($tree as $child) {
                        $except_child_id[] = $child['id'];
                    }

                    if (!empty($except_child_id) && in_array($new_parent['id'], $except_child_id)) {
                        echo 'Ban dang doi cha moi la cac danh muc nam trong danh muc. Khong duoc doi';
                        die;
                    }


                } else {
                    $new_level = 1;
                    $sql .= " ,parent_id=0";
                    $sql .= " ,level=" . $new_level . "";
                }

                $sql .= " WHERE id=".$data['id'];

            }


        } else {
            if ($data['parent_id'] > 0) {
                $parent = $this->getRow($data['parent_id']);
                $level = $parent['level'] + 1;
            } else {
                $level = 1;
            }


            // Trường hợp thêm mới
            $sql = "INSERT INTO category_article (category_name, category_intro, category_desc, created, parent_id, level)
VALUES ('". $data['category_name'] ."', '".$data['category_intro']."', '".$data['category_desc']."', '".$data['created']."', ".$data['parent_id'].", ".$level.")";

        }


        if ($this->conn->query($sql) === TRUE) {

            $tree = $this->getListCategoriesById($data['id']);
            if (!empty($tree)) {
                foreach ($tree as $child) {
                    $sql_update_tree = "UPDATE category_article SET";
                    $sql_update_tree .= " level=" . $child['level'];
                    $sql_update_tree .= " WHERE id=" . $child['id'];
                    $this->conn->query($sql_update_tree);
                }

            }

            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }


    public function delete($id) {

        $tree = $this->getListCategoriesById($id);

        $sql = "DELETE FROM category_article WHERE id=".$id;

        if(!empty($tree)) {
            foreach ($tree as $child) {
                $sql_child = "DELETE FROM category_article WHERE id=".$child['id'];
                $this->conn->query($sql_child);
            }
        }

        if ($this->conn->query($sql) === TRUE) {
            echo "Delete record successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }

    }



}