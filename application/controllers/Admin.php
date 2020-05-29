<?php
class Admin extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('user_id'))
      return redirect('login');
  }
  public function post()
  {
    $this->load->model('AdminP');
    $this->load->library('pagination');
    $config = [
      'base_url' => base_url('index.php/admin/post'),
      'per_page' => 10,

      'total_rows' => $this->AdminP->num_rows(),
      'full_tag_open' => "<ul class='pagination admin-pagination'>",
      'full_tag_close' => "</ul>",
      'next_tag_open' => "<li>",
      'next_tag_close' => "</li>",
      'prev_tag_open' => "<li>",
      'prev_tag_close' => "</li>",
      'num_tag_open' => "<li>",
      'num_tag_close' => "</li>",
      'cur_tag_open' => "<li class='active'><a>",
      'cur_tag_close' => "</a></li>"
    ];
    $this->pagination->initialize($config);
    $post = $this->AdminP->all_post(
      $config['per_page'],
      $this->uri->segment(3)
    );
    $this->load->view('admin/post', ['post' => $post]);
  }
  public function add_post()
  {
    $this->load->model('AdminM');
    $category = $this->AdminM->category();
    $this->load->view('admin/add_post', ['category' => $category]);
  }
  public function addpost()
  {
    $config = [
      'upload_path' => './images/',
      'allowed_types' => 'gif|jpg|png',
    ];

    $this->load->library('upload', $config);

    if ($this->form_validation->run('add_post_rules') && $this->upload->do_upload('post_img')) {
      $post = $this->input->post();
      $data = $this->upload->data();
      $post_img = base_url("images/" . $data['raw_name'] . $data['file_ext']);

      $post['post_img'] = $post_img;
      $this->load->model('AdminP');
      if ($this->AdminP->add_post($post)) {
        $this->session->set_flashdata('msg', 'Added successfully');
        $this->session->set_flashdata('class', 'alert-success');
      } else {
        $this->session->set_flashdata('msg', 'Failed');
        $this->session->set_flashdata('class', 'alert-success');
      }
      return redirect('admin/post');
    } else {
      $this->load->model('AdminM');
      $category = $this->AdminM->category();
      $upload_error = $this->upload->display_errors();
      $this->load->view('admin/add_post', ['category' => $category], compact('upload_error'));
    }
  }
  public function edit_post($post_id)
  {
    $this->load->model('AdminM');
    $category = $this->AdminM->category();
    $this->load->model('AdminP');
    $editval = $this->AdminP->find_post($post_id);
    $this->load->view('admin/update_post', ['editval' => $editval, 'category' => $category]);
  }
  public function update_post($post_id)
  {
    $config = [
      'upload_path' => './images/',
      'allowed_types' => 'gif|jpg|png',
    ];

    $this->load->library('upload', $config);

    if ($this->form_validation->run('add_post_rules') && $this->upload->do_upload('post_img')) {
      $post = $this->input->post();
      $data = $this->upload->data();
      $post_img = base_url("images/" . $data['raw_name'] . $data['file_ext']);

      $post['post_img'] = $post_img;
      $this->load->model('AdminP');
      if ($this->AdminP->update_post($post_id, $post)) {
        $this->session->set_flashdata('msg', 'Post Update successfully');
        $this->session->set_flashdata('class', 'alert-success');
      } else {
        $this->session->set_flashdata('msg', 'Post not update Please try again!!');
        $this->session->set_flashdata('class', 'alert-danger');
      }
      return redirect('admin/post');
    } else {

      $this->edit_post($post_id);
    }
  }
  public function del_post($post_id, $post_cat)
  {
    $this->load->model('AdminP');
    if ($this->AdminP->del_post($post_id, $post_cat)) {
      $this->session->set_flashdata('msg', 'Delete successfully');
      $this->session->set_flashdata('class', 'alert-success');
    } else {
      $this->session->set_flashdata('msg', 'Failed');
      $this->session->set_flashdata('class', 'alert-success');
    }
    return redirect('admin/post');
  }
  public function cate()
  {
    $this->load->model('AdminM');
    $category = $this->AdminM->category();
    $this->load->view('admin/category', ['category' => $category]);
  }
  public function add_cat()
  {
    $this->load->view('admin/add_category');
  }
  public function addcat()
  {
    if ($this->form_validation->run('add_cat_rules')) {
      $post = $this->input->post();
      $this->load->model('AdminP');
      if ($this->AdminP->addcat($post)) {
        $this->session->set_flashdata('msg', 'Added successfully');
        $this->session->set_flashdata('class', 'alert-success');
      } else {
        $this->session->set_flashdata('msg', 'Failed');
        $this->session->set_flashdata('class', 'alert-success');
      }
      return redirect('admin/cate');
    } else {
      $this->load->view('admin/add_category');
    }
  }
  public function del_cat($cat_id)
  {
    $this->load->model('AdminP');
    if ($this->AdminP->del_cat($cat_id)) {
      $this->session->set_flashdata('msg', 'Delete successfully');
      $this->session->set_flashdata('class', 'alert-success');
    } else {
      $this->session->set_flashdata('msg', 'Failed');
      $this->session->set_flashdata('class', 'alert-success');
    }
    return redirect('admin/cate');
  }
  public function all_user()
  {
    $this->load->model('AdminP');
    $all_user = $this->AdminP->all_user();
    $this->load->view('admin/users', ['users' => $all_user]);
  }
  public function add_user()
  {
    $this->load->view('admin/add_user');
  }
  public function adduser()
  {
    if ($this->form_validation->run('add_user_rules')) {
      $post = $this->input->post();
      $this->load->model('AdminP');
      if ($this->AdminP->adduser($post)) {
        $this->session->set_flashdata('msg', 'Added successfully');
        $this->session->set_flashdata('class', 'alert-success');
      } else {
        $this->session->set_flashdata('msg', 'Failed');
        $this->session->set_flashdata('class', 'alert-success');
      }
      return redirect('admin/all_user');
    } else {
      $this->load->view('admin/add_user');
    }
  }


  public function edit_user($user_id)
  {
    $this->load->model('AdminP');
    $editval = $this->AdminP->find_user($user_id);
    $this->load->view('admin/update_user', ['editval' => $editval]);
  }
  public function update_user($user_id)
  {
    if ($this->form_validation->run('add_user_rules')) {
      $post = $this->input->post();
      $this->load->model('AdminP');
      if ($this->AdminP->update_user($user_id, $post)) {
        $this->session->set_flashdata('msg', 'User Update successfully');
        $this->session->set_flashdata('class', 'alert-success');
      } else {
        $this->session->set_flashdata('msg', 'User not update Please try again!!');
        $this->session->set_flashdata('class', 'alert-danger');
      }
      return redirect('admin/all_user');
    } else {
      $this->edit_user($user_id);
    }
  }


  public function del_user($user_id)
  {
    $this->load->model('AdminP');
    if ($this->AdminP->del_user($user_id)) {
      $this->session->set_flashdata('msg', 'Delete successfully');
      $this->session->set_flashdata('class', 'alert-success');
    } else {
      $this->session->set_flashdata('msg', 'Failed');
      $this->session->set_flashdata('class', 'alert-success');
    }
    return redirect('admin/all_user');
  }
  public function logout()
  {
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('username');
    return redirect('login');
  }
}
