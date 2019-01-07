<?php

class login extends MY_Controller {
    
    public function __construct(){
         parent::__construct();
         if($this->session->userdata('id')) 
            redirect("admin/welcome");
    }
    
    
    public function index(){
        
      //$this->load->library("form_validation");
      $this->form_validation->set_rules("uname","User Name","required|alpha");
      $this->form_validation->set_rules("pass","Password","required|max_length[12]");
      $this->form_validation->set_error_delimiters("<div class = 'text-danger'>","</div>");
      if($this->form_validation->run()){
          
          $uname = $this->input->post('uname');
          $pass = $this->input->post('pass');
          $this->load->model("loginmodel");
          $id = $this->loginmodel->isvalidate($uname,$pass);
          if($id){
              $this->session->set_userdata("id",$id);
              return redirect("admin/welcome");
          }else{
              
              $this->session->set_flashdata("Login_failed","Invalid Username/Password");
               return redirect("login");
          }
          
      }else{
          
          $this->load->view("admin/login");
          
      }
        
    }
    
    
     public function sendEmail(){
        
        $this->form_validation->set_rules("username","User Name","required|alpha");
      $this->form_validation->set_rules("password","Password","required|max_length[12]");
        $this->form_validation->set_rules("first_name","First Name","required|alpha");
        $this->form_validation->set_rules("last_name","last Name","required|alpha");
        $this->form_validation->set_rules("email","Email","required|valid_email|is_unique[user.email]");
      $this->form_validation->set_error_delimiters("<div class = 'text-danger'>","</div>");
      if($this->form_validation->run()){
          $post = $this->input->post();
          $this->load->model("loginmodel","registered_user");
          
          if($this->registered_user->Registered($post)){
               $this->session->set_flashdata("User","Registration successful");
             $this->session->set_flashdata("User_report","alert alert-success"); 
          }else{
               $this->session->set_flashdata("User","Registration failed");
             $this->session->set_flashdata("User_report","alert alert-danger"); 
          }
          
          return redirect("login/register");
          
          /*$this->load->library("email");
          
          $this->email->from(set_value("eml"),set_value("fn"));
          $this->email->to("vishalpandya1512@gmail.com");
          $this->email->subject("Registration greeting..");
          $this->email->message("Thank you for Registration");
           $this->email->set_newline("\r\n");
           $this->email->send();
          
          if(!$this->email->send()){
              show_error($this->email->print_debugger());
          }else{
              
              echo "your mail has been sent..!";
          }*/
          
      }else{
          $this->load->view("admin/registerform");
          
      }
        
    }
    
    
     public function register(){
        
       // $this->load->model("registrationModel");
        $this->load->view("admin/registerform");
        
    }

}
?>