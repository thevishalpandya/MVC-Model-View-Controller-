<?php

class User extends MY_controller {
    
    public function index(){
        
        //$this->load->helper("url");
        //$this->load->helper("html");
       $this->load->model("loginmodel","ar");
        $this->load->library("pagination");
        $config = [
            'base_url' => base_url("user/index"),
            'per_page' => 2,
            'total_rows' => $this->ar->total_num_rows(),
            'full_tag_open' => "<ul class = 'pagination'>",
            'full_tag_close' => "</ul",
            'next_tag_open' => "<li class = 'page-item page-link'>",
            'next_tag_close' => "</li>",
            'prev_tag_open' => "<li class = 'page-item page-link'>",
            'prev_tag_close' => "</li>",
            'num_tag_open' => "<li class = 'page-item page-link'>",
            'num_tag_close' => "</li>",
            'cur_tag_open' => "<li class = 'page-item active'><a class = 'page-link'>",
            'cur_tag_close' => "</a></li>",
        ];
        $this->pagination->initialize($config);
        
        $articles = $this->ar->AllarticleList($config["per_page"],$this->uri->segment(3));
        $this->load->view("user/Homepage",["articles"=>$articles]);
        
    }
    }
    


?>