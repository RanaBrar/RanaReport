<?php

class AdminP extends CI_Model{
    public function admindatacheck($username,$password){
        $rana = $this->db->where(['username'=> $username,'password'=>md5($password)])
        ->get('user');
        if($rana->num_rows()){    
            return $rana->row();
        }
        else{
            return false;
        }  
   }
    public function all_post($limit,$offset)
    {
        if($this->session->userdata('role') == 1){
            $rana = $this->db->from('post')
            ->order_by('post_id', 'DESC')
            ->join('category','category.category_id = post.category')
            ->join('user','user.user_id = post.author')->limit($limit,$offset)
            ->get();
            return $rana->result();
        }
        elseif($this->session->userdata('role') == 0){
            $User_id = $this->session->userdata('user_id');
            $rana = $this->db->where(['author'=> $User_id])
            ->from('post')
            ->order_by('post_id', 'DESC')
            ->join('category','category.category_id = post.category')
            ->join('user','user.user_id = post.author')->limit($limit,$offset)
            ->get();
            return $rana->result();
        }
    }
    public function add_post($post)
    {   
        date_default_timezone_set("Asia/Kolkata");
        $date =  date("h:ia,d-m-Y");
        $post['post_date']=$date;
        $rana = $this->db->where('category_id',$post['category'])
        ->set('post',('post+1'), FALSE)
        ->update('category');
        return $this->db->insert('post', $post);
        
    }
    public function find_post($post_id)
    {
        $rana = $this->db->where('post_id',$post_id)->get('post');
        return $rana->row();
    }
    public function update_post($post_id,array $post)
    {
        date_default_timezone_set("Asia/Kolkata");
        $date =  date("h:ia,d-m-Y");
        $post['post_date']=$date;
        return $this->db->where('post_id',$post_id)
        ->update('post',$post);
    }
    public function del_post($post_id,$post_cat)
    { 
         $rana = $this->db->where('category_id',$post_cat)
        ->set('post',('post-1'), FALSE)
        ->update('category');
            return $this->db->delete('post',['post_id'=>$post_id]);
    }
    public function num_rows()
    {
        if($this->session->userdata('role') == 1){
        $rana = $this->db->get('post');
        return $rana->num_rows();
        }
        elseif($this->session->userdata('role') == 0){
            $User_id = $this->session->userdata('user_id');
            $rana = $this->db->where(['author'=> $User_id])
            ->get('post');
            return $rana->num_rows();
        }
    }
    public function addcat($post)
    {
        return $this->db->insert('category', $post);
    }
    public function del_cat($cat_id)
    { 
            return $this->db->delete('category',['category_id'=>$cat_id]);
    }
    public function all_user()
    {
       return $this->db->get('user')->result();   
    }
    public function adduser($post)
    {
        $post['password']=md5($post['password']);
        return $this->db->insert('user', $post);
    }
    public function find_user($user_id)
    {
        $rana = $this->db->where('user_id',$user_id)->get('user');
        return $rana->row();
    }
    public function update_user($user_id,array $post)
    {
        $post['password']=md5($post['password']);
        return $this->db->where('user_id',$user_id)
        ->update('user',$post);
    }
    public function del_user($user_id)
    { 
            return $this->db->delete('user',['user_id'=>$user_id]);
    }
}