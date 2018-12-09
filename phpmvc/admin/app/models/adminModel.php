<?php

class adminModel extends Database {

    public $table = 'admins';

    public $fields = array(
        'username' => '',
        'password' => '',
        'login_time' => '',
        'logout_time' => '',
        'email' => '',
        'name' => '',
        'address' => '',
        'phone' => '',
        'note' => '',
        'status' => 0,
        'avatar' => '',
    );

    public $type_fields = array(
        'username' => 'text',
        'password' => 'text',
        'login_time' => 'datetime',
        'logout_time' => 'datetime',
        'email' => 'text',
        'name' => 'text',
        'address' => 'text',
        'phone' => 'text',
        'note' => 'text',
        'status' => 'int',
        'avatar' => 'text',
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



    public function getLogin($email, $password) {

        $sql = "SELECT * FROM " . $this->table . " WHERE email = '" . mysqli_real_escape_string($this->conn, $email)
        . "' AND password = '" . mysqli_real_escape_string($this->conn, md5($password)) . "'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {


                return $row;
            }
        }

        return array();
    }

    public function getRow($id) {

        $sql = "SELECT * FROM " . $this->table . " WHERE id=" . (int) $id;
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                return $row;
            }
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

    public function store($data) {

        $id = isset($data['id']) ? $data['id'] : 0;

        if (isset($_FILES['avatar']) && !empty($_FILES['avatar']) && !empty($_FILES['avatar']['name'])) {
            $uploader = new Uploader();
            $upload_respond = $uploader->upload('avatar');
            $data['avatar'] = $upload_respond['new_file'];
        }

        if ($id > 0) {

            $data_old = $this->getRow($id);
            $data = array_merge($data_old, $data);
            unset($data['id']);

            if (isset($data['password']) && !empty($data['password'])) {
                $data['password'] = md5($data['password']);
            }

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
            $sql = "UPDATE ".$this->table." SET ".$update." WHERE id=".(int)$id;

            if ($this->conn->query($sql) === TRUE) {
                return true;
            } else {
                return false;
            }
        } else {
            // insert
            $data = array_merge($this->fields, $data);

            $data['password'] = md5($data['password']);

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

        $sql = "DELETE FROM ".$this->table." WHERE id = " . (int) $id;

        if ($this->conn->query($sql) === TRUE) {
            return true;
        }

        return false;
    }
}