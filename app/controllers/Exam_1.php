<?php 
class Exam_1 extends Controller {
    public function __construct()
    {
        
    }
    public function index() {
        $data['x'] = false;
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $input = $_POST['input'];
            if($this->check_f($input)) {

                $index = $this->findIndex($input);
                $fib =  $this->findFib($index+4000000);

                $data['x'] = true;
                $data['message'] = "The index of $input is $index. <br> The Fibonacci Number at index $index+4,000,000 is $fib." ;


            } else {
                $data['message'] = "The number you entered is not a Fibonacci Number.";
                $data['x'] = true;
            }
        }
        $this->view('page_head');
        $this->view('exam_1' , $data);
    }

    public function findIndex($input) 
    { 
        if ($input <= 1) 

            return $input; 

        $a = 0; $b = 1; $c = 1; 
        $res = 1; 
        while ($c < $input) 
        { 
            $c = $a + $b; 

            $res++; 
            $a = $b; 
            $b = $c; 
        } 
        return $res; 
    } 


    public function findFib($index) {
        $f1 = -1;
        $f2 = 1;
    
        for ($i = 1; $i <= $index+1; $i++) {
            $f = $f1 + $f2;
            $f1 = $f2;
            $f2 = $f;
        }
        return $f;
    }


    public function check_s($input) 
    { 
        $s = (int)(sqrt($input)); 
        return ($s * $s == $input); 
    } 
    
    public function check_f($input) 
    { 
        return $this->check_s(5 * $input * $input + 4) || $this->check_s(5 * $input * $input - 4); 
    } 


    public function sorting() {
        
        $data['x'] = 0;
        if($_SERVER['REQUEST_METHOD'] == 'POST') { 
            $data['x'] = 1;
            $inputs =explode(" " , $_POST['input']);
            if(count($inputs) < 4 ) {
                $data['message'] = "Enter atleast 5 numbers and separate them using spaces. <br> e.g. 1 23 45 56 7";
            } else {
                if($_POST['sortby'] == '1') {
                    sort($inputs);
                    $data['message'] = 'Sorted Lowest to Highest: <b>';
                    foreach($inputs as $i) {
                        $data['message'] .= $i . ' ';
                    } 
                } else {
                    rsort($inputs);
                    $data['message'] = 'Sorted Highest to Lowest:  <b>';
                    foreach($inputs as $i) {
                        $data['message'] .= $i . ' ';
                    } 
                }
            }
            
        }

        $this->view('page_head');
        $this->view('sorting' , $data);

    }
}