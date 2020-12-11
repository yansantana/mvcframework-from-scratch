<?php

class Index extends Controller {
    public function index() {
        $this->view('page_head');
        $this->view('menu');
    }
}