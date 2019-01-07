<?php

class Loginmodel extends CI_Model{
    
    public function isvalidate($username,$password){
        
        $query = $this->db->where(["username"=>$username,"password"=>$password])
                          ->get("user");

        if($query->num_rows()){
            return $query->row()->id;
        }else{
            return false;
        }
    }
    
    public function articleList($limit,$offset){
        
        $id = $this->session->userdata("id");
        $query = $this->db->select()
                 ->from("article")
                 ->where(["user_id"=>$id])
                 ->limit($limit,$offset)
                 ->get();
        return $query->result();
        
    }
    
    public function num_rows(){
        
        $id = $this->session->userdata("id");
        $query = $this->db->select()
                 ->from("article")
                 ->where(["user_id"=>$id])
                 ->get();
        return $query->num_rows();
        
    }
    
    
    public function AllarticleList($limit,$offset){
        
        $query = $this->db->select()
                 ->from("article")
                 ->limit($limit,$offset)
                 ->get();
        return $query->result();
        
    }
    
    public function total_num_rows(){
         $query = $this->db->select()
                 ->from("article")
                 ->get();
        return $query->num_rows();
    }
    
    public function addArticle($array){
        
        return $this->db->insert("article",$array);
        
    }
    
    public function Registered($array){
        
        return $this->db->insert("user",$array);
        
    }
    
    public function del($id){
        
        return $this->db->delete("article",["id"=>$id]);
        
    }
    
    
    public function find_article($articleid)
  {
   $q=$this->db->select(['article_title','article_body','id'])
            ->where('id',$articleid)
            ->get('article');
            return $q->row();


  }
    
    public  function update_article($articleid,array $article){
        
        return $this->db->where("id",$articleid)
                 ->update("article",$article);
        
    }
    
}

?>