<?php
class AdminM extends CI_Model{
    public function display($limit,$offset)
    {
        $rana = $this->db->from('post')
        ->order_by('post_id','DESC')
        ->join('category','category.category_id = post.category')
        ->join('user','user.user_id = post.author')->limit($limit,$offset)
        ->get();
        return $rana->result();
    }
    public function category()
    {
        $rana = $this->db->get('category');
        return $rana->result();
    }
    public function sidebar()
    {
        $rana =  $rana = $this->db->from('post')
        ->order_by('post_id','DESC')
        ->join('category','category.category_id = post.category')
        ->limit(5)
       ->get();
        return $rana->result();
    }
    public function cat_page($category_id,$limit,$offset)
    {
        $rana = $this->db->limit($limit,$offset)->where(['category'=>$category_id])
        ->order_by('post_id','DESC')
        ->join('category','category.category_id = post.category')
        ->join('user','user.user_id = post.author')
        ->get('post');
        return $rana->result();
    }
    public function author($author_id,$limit,$offset)
    {
        $rana = $this->db->where(['author'=>$author_id])
        ->limit($limit,$offset)
        ->order_by('post_id','DESC')
        ->join('category','category.category_id = post.category')
        ->join('user','user.user_id = post.author')
        ->get('post');
        return $rana->result();
    }
    public function single($post_id)
    {
        $rana = $this->db->where(['post_id'=>$post_id])
        ->join('category','category.category_id = post.category')
        ->join('user','user.user_id = post.author')
        ->get('post');
        return $rana->result();
    }
    public function search($post,$limit,$offset)
    {
        $sql = $this->db
        ->order_by('post_id','DESC')
        ->limit($limit,$offset)
        ->join('category','category.category_id = post.category')
        ->join('user','user.user_id = post.author')
        ->like('title',$post)
        ->or_like('description',$post)
        ->or_like('post_date',$post)
        ->or_like('username',$post)
        ->or_like('category_name',$post)
        ->get('post');
        return $sql->result();
      
    }
    public function num_rows()
    {
        $rana = $this->db->get('post');
        return $rana->num_rows();
    }
    public function num_rows1($category_id)
    {
        $rana = $this->db->where(['category'=>$category_id])->get('post');
        return $rana->num_rows();
    }
    public function num_rows2($author_id)
    {
        $rana = $this->db->where(['author'=>$author_id])->get('post');
        return $rana->num_rows();
    }
    public function num_rows3($post)
    {
        $rana = $this->db
        ->join('category','category.category_id = post.category')
        ->join('user','user.user_id = post.author')
        ->like('title',$post)
        ->or_like('description',$post)
        ->or_like('post_date',$post)
        ->or_like('username',$post)
        ->or_like('category_name',$post)
        ->get('post');
        return $rana->num_rows();
    }
}
?>