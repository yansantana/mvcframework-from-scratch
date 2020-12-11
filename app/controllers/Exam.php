<?php
class Exam extends Controller {
    public function __construct()
    {
        session_start();
        $this->exam_m = $this->model('Exam_m');
    }
    public function index() {
        $this->check();
        $employees = $this->exam_m->getEmployees();
        $data = [
            'title' => 'Home Page',
            'employees' => $employees
        ];
        $this->view('page_head');
        $this->view('index', $data);
    }
    public function login() {
        $data['x']=0;
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data['email'] = $_POST["email"];
            $data['password'] = $_POST["password"];

            $loggedInUser = $this->exam_m->login($data['email'], $data['password']);
            if($loggedInUser) {
                $_SESSION['loggedin'] = true;
                $_SESSION['access_level'] = $loggedInUser->access_level_id;
                header("Location:" . URLROOT . '/exam');
                exit;
            } else {
                $data['x']=1;
                $data['message'] = 'Login failed. <br> Invalid email or password.';
            }
                
        }
        $this->view('page_head');
        $this->view('login' ,$data);
    }
    public function add_employee($id=NULL) {
        $this->check();
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data['firstname'] = $_POST["firstname"];
            $data['lastname'] = $_POST["lastname"];
            $data['age'] = $_POST["age"];
            $data['birth_date'] = $_POST["birth_date"];
            $data['job_title'] = $_POST["job_title"];
            $data['access_level_id'] = $_POST["access_level_id"];
            $data['email'] = $_POST["email"];
            $data['password'] = $_POST["password"];
            $data['date_created'] = date ('Y-m-d');
            $data['date_modified'] = date ('Y-m-d');

            if($id) {
                if($this->exam_m->insertEmployee($data , $id)) {
                    header("Location:" . URLROOT . '/exam');
                    exit;
                }
            } else {
                if($this->exam_m->insertEmployee($data)) {
                    header("Location:" . URLROOT . '/exam');
                    exit;
                }
            }
        }
        $data['id'] = $id;
        $data['employee'] = $this->exam_m->getEmployees($id);
        $access = $this->exam_m->getAccess();
        $data['access'] = $access;
        $this->view('page_head');
        $this->view('add_employee' , $data);
    }

    public function delete($id) {
        if($this->exam_m->delete($id)) {
            header("Location:" . URLROOT . '/exam');
            exit;
        }
    }

    public function access_levels () {
        $this->check();
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data['description'] = $_POST["description"];

            echo $data['description'];
            if($this->exam_m->insertAccess($data)) {
                header("Location:" . URLROOT . '/exam/access_levels/');
                exit;
            }
        }
        $access = $this->exam_m->getAccess();
        $data['access'] = $access;
        $this->view('page_head');
        $this->view('access_levels' , $data);
    }

    public function delete_access($id) {
        if($this->exam_m->delete_access($id)) {
            header("Location:" . URLROOT . '/exam/access_levels/');
            exit;
        }
    }
    public function logout() {
        session_destroy();
        header("Location:" . URLROOT . '/exam/login/');
        exit;
    }
}