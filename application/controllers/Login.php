<?php
class Login extends MY_Controller{
    public function __construct()
    {
      parent::__construct();
      if( $this->session->userdata('user_id') )
      return redirect('admin/post');
      
    }
    public function index(){
        $this->form_validation->set_rules('username', 'User Name','required|alpha');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|max_length[6]');  
        if($this->form_validation->run()){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->load->model('AdminP');
            $user_id = $this->AdminP->admindatacheck($username,$password);
            if($user_id){
                $this->load->library('session');
                $this->session->set_userdata('user_id',$user_id->user_id);   
                $this->session->set_userdata('username',$username);   
                $this->session->set_userdata('role',$user_id->role);        
                redirect('admin/post');   
            }
            else{
                echo "<script>
                    alert('Not Match');
                </script>";
                $this->load->view('admin/index');          
            }    
        }
        else{
            $this->load->view('admin/index');    
        }
    }
}