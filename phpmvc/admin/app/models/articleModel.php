<?php
class articleModel extends Database {

    public $table = 'posts';

    public $primary_key = 'post_id';

    public $fields_valid = array(
        'post_id',
        'post_title',
        'post_slug',
        'post_parent_id',
        'post_intro',
        'post_content',
        'post_status',
        'post_created',
        'post_edited',
        'post_images'
    );

    public $fields = array(
        'post_title' => '',
        'post_slug' => '',
        'post_parent_id' => 0,
        'post_intro' => '',
        'post_content' => '',
        'post_status' => 0,
        'post_created' => '',
        'post_edited' => '',
        'post_images' => ''
    );

    public $type_fields = array(
        'post_title' => 'text',
        'post_slug' => 'text',
        'post_parent_id' => 'int',
        'post_intro' => 'text',
        'post_content' => 'text',
        'post_status' => 'int',
        'post_created' => 'text',
        'post_edited' => 'text',
        'post_images' => 'text',
    );

    public $conn;

    public function __construct()
    {
        parent::__construct();
        $this->conn = self::$connection;
    }

    public function getInsertLastId() {
        return $this->conn->insert_id;
    }

    public function getRow($id) {

        $sql = "SELECT * FROM " . $this->table . " WHERE ".$this->primary_key."=" . (int) $id;
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                return $row;
            }
        }

        return array();
    }

    public function getDataByPage($offset, $limit) {
        $sql = "SELECT * FROM " . $this->table . " LIMIT $offset,$limit";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $data = array();
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

        return array();
    }

    public function getRows() {
        $sql = "SELECT * FROM " . $this->table;
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $data = array();
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

        return array();
    }

    public function store($arg_data) {

        $data = array();
        if (!empty($arg_data)) {
            foreach ($arg_data as $name => $value) {
                if (in_array($name, $this->fields_valid)) {
                    $data[$name] = $value;
                }
            }
        }

        $id = isset($data['id']) ? $data['id'] : 0;

        if ($id > 0) {
            $data_old = $this->getRow($id);
            $data = array_merge($data_old, $data);
            unset($data['id']);

            $update = '';
            foreach ($data as $field => $value) {

                if (!$update) {
                    if (is_numeric($value)) {
                        $update .= " " . $field . " = " . (int)$value;
                    } else {
                        $update .= " " . $field . " = '" . mysqli_real_escape_string($this->conn, $value) . "'";
                    }
                } else {
                    if (is_numeric($value)) {
                        $update .= " , " . $field . " = " . (int)$value;
                    } else {
                        $update .= " , " . $field . " = '" . mysqli_real_escape_string($this->conn, $value) . "'";
                    }
                }

            }

            // update
            $sql = "UPDATE ".$this->table." SET ".$update." WHERE ".$this->primary_key."=".(int)$id;

            if ($this->conn->query($sql) === TRUE) {
                return true;
            } else {
                return false;
            }
        } else {
            // insert
            $data = array_merge($this->fields, $data);

            $fields = array_keys($this->fields);

            $values = array();
            foreach ($this->type_fields as $field_name => $field_type) {
                if ($field_type == 'int') {
                    $values[] = (int) $data['status'];
                } else {
                    $values[] = "'".mysqli_real_escape_string($this->conn, $data[$field_name])."'";
                }
            }

            $sql = "INSERT INTO ".$this->table." (".implode(',', $fields).")
VALUES (".implode(',', $values).")";

            if ($this->conn->query($sql) === TRUE) {
                return true;
            } else {
                return false;
            }
        }

       return false;
    }


    public function remove($id) {

        $sql = "DELETE FROM ".$this->table." WHERE ".$this->primary_key." = " . (int) $id;

        if ($this->conn->query($sql) === TRUE) {
            return true;
        }

        return false;
    }
}