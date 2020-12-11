<?php

class Exam_m {
    private $db;

    public function __construct()   
    {
        $this->db = new Database();
    }

    public function getEmployees($id=NULL) {
        if($id) {
            $this->db->query("SELECT * FROM employees WHERE id=:id");
            $this->db->bind(':id' , $id);
            $result = $this->db->single();
            return $result;
        } else {
            $this->db->query("SELECT * FROM employees");
            $result = $this->db->resultSet();
            return $result;
        }
    }

    public function getAccess() {
        $this->db->query("SELECT * FROM access_levels");

        $result = $this->db->resultSet();
        return $result;
    }

    public function insertEmployee($data, $id=NULL) {

        if($id){
            $this->db->query("UPDATE employees SET firstname=:firstname, lastname=:lastname, age=:age, birth_date=:birth_date, job_title=:job_title, access_level_id=:access_level_id, email=:email, password=:password, date_created=:date_created, date_modified=:date_modified WHERE id=:id");
        } else {
            $this->db->query("INSERT INTO employees (firstname, lastname, age, birth_date, job_title, access_level_id, email, password, date_created, date_modified) VALUinto ES (:firstname, :lastname, :age, :birth_date, :job_title, :access_level_id, :email, :password, :date_created, :date_modified )");
        }
        if($id) {
            $this->db->bind(':id' , $id);
        }
        $this->db->bind(':firstname', $data['firstname']);
        $this->db->bind(':lastname', $data['lastname']);
        $this->db->bind(':age', $data['age']);
        $this->db->bind(':birth_date', $data['birth_date']);
        $this->db->bind(':job_title', $data['job_title']);
        $this->db->bind(':access_level_id', $data['access_level_id']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':date_created', $data['date_created']);
        $this->db->bind(':date_modified', $data['date_modified']);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function delete($id) {
        $this->db->query("DELETE FROM employees WHERE id=:id");
        
        $this->db->bind(':id', $id);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }
    public function delete_access($id) {
        $this->db->query("DELETE FROM access_levels WHERE access_level_id=:id");
        
        $this->db->bind(':id', $id);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }
    public function insertAccess($data) {
        $this->db->query("INSERT INTO access_levels (description) VALUES (:description)");
        $this->db->bind(':description' , $data['description']);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function login($email, $password) {
        $this->db->query('SELECT * FROM employees WHERE email = :email');
        //Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();
        if($row) {
            if ($password == $row->password) {
                return $row;
            } else {
                return false;
            }
        }
    }
}