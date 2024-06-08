<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Home_model');
    }
    public function index(){
        $this->template->load('template_home', 'home/dokumentasi');

    }
}