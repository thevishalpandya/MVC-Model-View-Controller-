<?php

class Admin extends MY_Controller { 
    
    public function __construct(){
       parent::__construct(); 
        if(! $this->session->userdata('id'))
            redirect("login");
       
        
    }
    
    public function welcome(){
        $this->load->model("loginmodel","ar");
        $this->load->library("pagination");
        $config = [
            'base_url' => base_url("admin/welcome"),
            'per_page' => 2,
            'total_rows' => $this->ar->num_rows(),
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
        
        $articles = $this->ar->articleList($config["per_page"],$this->uri->segment(3));
         $this->load->view("admin/dashboard",["articles"=>$articles]);
        
    }
    
     public function logout(){
         
        $this->session->unset_userdata('id');
            return redirect("login");
        
    }
    
    public function userValidation(){
        
        $config = [
            "upload_path" => "./upload/",
            "allowed_types" => "jpg|png|gif",
        ];
        
        $this->load->library("upload",$config);
        
        if($this->form_validation->run("add_article_rules") && $this->upload->do_upload()){
            $post = $this->input->post();
            
            $data = $this->upload->data();
            
            $img_path = base_url("upload/".$data['raw_name'].$data['file_ext']);
            $post["img_path"] = $img_path;
            
            $this->load->model("loginmodel","insertArticle");
            
            if($this->insertArticle->addArticle($post)){
                
        $this->session->set_flashdata("msg","Data is inserted successful");
             $this->session->set_flashdata("msg_report","alert alert-success");   
            }else{
                
                 $this->session->set_flashdata("msg","Data is failed to insert");
             $this->session->set_flashdata("msg_report","alert alert-danger");
            }
            
            redirect("admin/welcome");
            
        }else{
            $upload_error = $this->upload->display_errors();
         $this->load->view("admin/add_article",compact("upload_error"));    
        }
    }
    
   public function updatearticle($id){
        
       if($this->form_validation->run("add_article_rules")){
          
            $post = $this->input->post();
            $this->load->model("loginmodel","updateArticle");
            
            if($this->updateArticle->update_article($id,$post)){
                
        $this->session->set_flashdata("msg","Data is edited successful");
             $this->session->set_flashdata("msg_report","alert alert-success");   
            }else{
                
                 $this->session->set_flashdata("msg","Data is failed to edit");
             $this->session->set_flashdata("msg_report","alert alert-danger");
            }
            
            redirect("admin/welcome");
            
        }else{
         $this->load->view("admin/editarticle");    
        }
       
    }
    
    public function edituser($id)
 {
 $this->load->model('loginmodel');
 $article=$this->loginmodel->find_article($id);
 $this->load->view('admin/edit_article',['article'=>$article]);

 }  
     public function deluser(){
         
        $id = $this->input->post("id");
        
         $this->load->model("loginmodel","delArticle");
         $delete = $this->delArticle->del($id);
         if($delete){
             $this->session->set_flashdata("msg","Article is deleted successful");
             $this->session->set_flashdata("msg_report","alert alert-success"); 
         }else{
              $this->session->set_flashdata("msg","Article is failed to delete");
             $this->session->set_flashdata("msg_report","alert alert-danger");
         }
         
         return redirect("admin/welcome");
        
    }
    
   
   
    
   
        
    }

?>