<?php
class User extends MY_Controller{
    public function index()
    {
        $this->load->model('AdminM');
        $this->load->library('pagination');
        $config=[
              'base_url' => base_url('index.php/user/index'),
              'per_page' =>3,
              'num_links'=>5,
              'total_rows' => $this->AdminM->num_rows(),
              'full_tag_open'=>"<ul class='pagination'>",
              'full_tag_close'=>"</ul>",
              'next_tag_open' =>"<li>",
              'next_tag_close' =>"</li>",
              'prev_tag_open' =>"<li>",
              'prev_tag_close' =>"</li>",
              'num_tag_open' =>"<li>",
              'num_tag_close' =>"</li>",
              'cur_tag_open' =>"<li class='active'><a>",
              'cur_tag_close' =>"</a></li>"
       ];
        $this->pagination->initialize($config);
        $display = $this->AdminM->display($config['per_page'],$this->uri->segment(3));
        $sidebar = $this->AdminM->sidebar();
        $category = $this->AdminM->category();
        $this->load->view('user/index',['display'=>$display,'category'=>$category,'sidebar'=>$sidebar]);
    }
    public function cat_page($category_id)
    {
        $category_id = $this->uri->segment(3);
        $this->load->model('AdminM');
        $this->load->library('pagination');
        $config=[
              'base_url' => base_url("index.php/user/cat_page/$category_id"),
              'per_page' =>3,
              'uri_segment'=>4,
              'num_links'=>5,
              'total_rows' => $this->AdminM->num_rows1($category_id),
              'full_tag_open'=>"<ul class='pagination'>",
              'full_tag_close'=>"</ul>",
              'next_tag_open' =>"<li>",
              'next_tag_close' =>"</li>",
              'prev_tag_open' =>"<li>",
              'prev_tag_close' =>"</li>",
              'num_tag_open' =>"<li>",
              'num_tag_close' =>"</li>",
              'cur_tag_open' =>"<li class='active'><a>",
              'cur_tag_close' =>"</a></li>"
       ];
        $this->pagination->initialize($config);

        $this->load->model('AdminM');
        $display = $this->AdminM->cat_page($category_id,$config['per_page'],$this->uri->segment(4));
       $sidebar = $this->AdminM->sidebar();
       $category = $this->AdminM->category();
       $this->load->view('user/category',['display'=>$display,'category'=>$category,'sidebar'=>$sidebar]);
    }
    public function author($author_id)
    {
        
            $category_id = $this->uri->segment(3);
            $this->load->model('AdminM');
            $this->load->library('pagination');
            $config=[
                  'base_url' => base_url("index.php/user/author/$author_id"),
                  'per_page' =>3,
                  'uri_segment'=>4,
                  'num_links'=>5,
                  'total_rows' => $this->AdminM->num_rows2($author_id),
                  'full_tag_open'=>"<ul class='pagination'>",
                  'full_tag_close'=>"</ul>",
                  'next_tag_open' =>"<li>",
                  'next_tag_close' =>"</li>",
                  'prev_tag_open' =>"<li>",
                  'prev_tag_close' =>"</li>",
                  'num_tag_open' =>"<li>",
                  'num_tag_close' =>"</li>",
                  'cur_tag_open' =>"<li class='active'><a>",
                  'cur_tag_close' =>"</a></li>"
           ];
            $this->pagination->initialize($config);
        $display = $this->AdminM->author($author_id,$config['per_page'],$this->uri->segment(4));
       $sidebar = $this->AdminM->sidebar();
       $category = $this->AdminM->category();
       $this->load->view('user/author',['display'=>$display,'category'=>$category,'sidebar'=>$sidebar]);
    }
    public function single($post_id)
    {
        $this->load->model('AdminM');
        $display = $this->AdminM->single($post_id);
       $sidebar = $this->AdminM->sidebar();
       $category = $this->AdminM->category();
       $this->load->view('user/single',['display'=>$display,'category'=>$category,'sidebar'=>$sidebar]);
    }
    public function search()
    {
        $post = $this->input->post();
        $search = $post['search']; 
        return redirect("user/search_result/$search");
    }
    public function search_result($search)
    {
        $category_id = $this->uri->segment(3);
            $this->load->model('AdminM');
            $this->load->library('pagination');
            $config=[
                  'base_url' => base_url("index.php/user/search/$search"),
                  'per_page' =>3,
                  'uri_segment'=>4,
                  'num_links'=>5,
                  'total_rows' => $this->AdminM->num_rows3($search),
                  'full_tag_open'=>"<ul class='pagination'>",
                  'full_tag_close'=>"</ul>",
                  'next_tag_open' =>"<li>",
                  'next_tag_close' =>"</li>",
                  'prev_tag_open' =>"<li>",
                  'prev_tag_close' =>"</li>",
                  'num_tag_open' =>"<li>",
                  'num_tag_close' =>"</li>",
                  'cur_tag_open' =>"<li class='active'><a>",
                  'cur_tag_close' =>"</a></li>"
           ];
            $this->pagination->initialize($config);
        $display = $this->AdminM->search($search,$config['per_page'],$this->uri->segment(4));
        $sidebar = $this->AdminM->sidebar();
        $category = $this->AdminM->category();
        $this->load->view('user/search',['display'=>$display,'category'=>$category,'sidebar'=>$sidebar,'s'=>$search]);
    }
}

?>