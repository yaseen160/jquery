<?php
defined('BASEPATH') or exit('No direct script access allowed');

class calculator extends CI_Controller
{
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    //pagnination

    function favorite(){
            $admin=$this->session->userdata('admin');
        $data['fav']=$this->model->favoritelist($admin);
        $this->load->view('favoritelist',$data);
    }


    function History($page = 1){
  if($page<=0)
         {
      $page=1;
        }


          $admin=$this->session->userdata('admin');
          $data['current_page'] = $page;
          $config = array();
        $config["base_url"] = base_url() . "calculation";
        $config["total_rows"] = $this->model->record_count();
        $config["per_page"] = 2; 
        $config["uri_segment"] = 3; 

        $this->pagination->initialize($config);

      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $offset = max(0, ($page - 1) * $config["per_page"]);
$data["results"] = $this->model->fetch_data($config["per_page"], $offset);
    

   

        $this->load->model('model');
 $data['abs'] = $this->model->grouplist($admin);
 
      $data['historys'] = $this->model->historylist($admin);

    $data['ac'] = $this->model->countdetail();
        $this->load->view('History',$data);
    }


	function __construct() {
        parent::__construct();
        $this->load->model('model');
        $this->load->library('pagination');
    }


//     function index() {

//       $admin=$this->session->userdata('admin');
//       $data['fav']=$this->model->favoritelist($admin);
// $this->load->model('model');
//  $data['abs'] = $this->model->grouplist($admin);
//  $data['fav']=$this->model->favoritelist($admin);
//       $data['historys'] = $this->model->historylist();

//     $data['ac'] = $this->model->countdetail();
         
//     $this->load->view('calculator',$data);
   
//     }

   

//     function calculate() {
//         $operand1 = $this->input->post('operand1');
//         $operand2 = $this->input->post('operand2');
//      $operator = $this->input->post('operator');
//              switch ($operator)  {
//             case '+':
//                 $result = $operand1 + $operand2;
//                 break;
//             case '-':
//                 $result = $operand1 - $operand2;
//                 break;
//             case '*':
//                 $result = $operand1 * $operand2;
//                 break;
//             case '/':
//                 $result = $operand1 / $operand2;
//                 break;
//                  case '%':
//                 $result  = ($operand1 * $operand2) / 100;
//                 break;
             
//             default:
//                 $result = "Invalid operator";
//         }

//        $admin = $this->session->userdata('admin');;

//     $this->load->model('model');


//     $this->session->set_userdata('result', $result);
//     $data['result']=$this->session->userdata('result');
//      $data['abs'] = $this->model->grouplist($admin);
//  $data['fav']=$this->model->favoritelist($admin);
//       $data['historys'] = $this->model->historylist($admin);
//  $data['ac'] = $this->model->countdetail();
//   $this->load->model('model');

// $this->model->save_result($operand1,$operand2,$operator,$result);
    
//    $this->load->view('calculator',$data);
    

    
      

//     }
    function login_page(){
         $this->session->sess_destroy();
        $this->load->view('login');
    }
       function sigin_page(){
        $this->load->view('sigin');
    }



    function authenticate()
   {
    $email = $this->input->post('email');
    $psw = $this->input->post('psw');
    
    $check = $this->model->checksigin($email, $psw);
    if($check){
        $adminid = $check[0]['admin_id'];

        $the_session = array("admin" => $adminid);
        $this->session->set_userdata($the_session);

        redirect('calculation', 'refresh');
    }
    else{
        redirect('calculation', 'refresh');
    }
    }
    function save_sigin() //insert
    {
        $email=$this->input->post('email');
        $psw=$this->input->post('psw');
    


        $value = array(
                    'admin_email' => $email,
                    'admin_password' => $psw,
                    
                );
        $this->load->model('model');

        $save = $this->model->savesigin($value);

        if($save)
        {
            redirect('login', 'refresh');
        }
        else{
            redirect('', 'refresh');
        }
         

} 




function view_history()
    {


      $admin = $this->session->userdata('admin');        

         
       
        
     $data['historys'] = $this->model->historylist($admin); 
        
     

       $this->load->view('calculator',$data);

       
        
}
function favoritelist(){

        $admin=$this->session->userdata('admin');
    $result_id=$this->input->post('result_id');


    $value=array(
        'result_fav'=>1
    );

      $this->load->model('model');
  $data['fav']=$this->model->favoritelist($admin);
    $this->load->model('model');
 $value=$this->model->get_favorite($result_id,$value);

     redirect('historyab','refresh');
}
function group(){
     $admin=$this->session->userdata('admin');
    $result_id=$this->input->post('result_id');
    $this->load->model('model');
          $data['abs'] = $this->model->grouplist($admin);
           $this->load->view('calculator',$data);



}

function changepassword()
    {
        
         $eid = $this->session->userdata('admin');
            
            $data['error'] = $this->session->flashdata('error');

           

            $data['admin'] = $this->model->data($eid);

            
        $this->load->view('change_password');
        
    }

    function set_password()
    {
        $eid = $this->session->userdata('admin');
        $old = $this->input->post('old'); 
        $new = $this->input->post('new'); 
        $confirm = $this->input->post('confirm'); 

        $check = $this->model->check_old($eid, $old);

        if($check)
        {
            if($new==$confirm)
            {
                $value = array(
                    'admin_password' => $confirm                   
                );

            $update = $this->model->update_profile($eid, $value);
         
                if($update)
                {
                    redirect('calculation', 'refresh');
                }
                else{            
                    $this->session->set_flashdata('error','1');
                    redirect('password', 'refresh');
                }
            }    
            else{
                $this->session->set_flashdata('error','Passwords do not match');
                redirect('password', 'refresh');
            }        
        }    
        else{            
            $this->session->set_flashdata('error','Old Password is not correct');
            redirect('password', 'refresh');
        }    
    }
    function upload(){
        $this->load->view('uploadpic');
    }
function updatepic(){
$eid = $this->session->userdata('admin');

$target_dir = "assets/upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
if($check !== false) {
    
    $uploadOk = 1;
      move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
} else {
    
    $uploadOk = 0;
}


if ($uploadOk == 1) {
    $email = $this->input->post('email');

    $data = array(
        'admin_email' => $email,
        'admin_pic' => $target_file
    );

 $updated = $this->model->pic($eid, $data);


    if ($updated) {
        redirect('calculation', 'refresh');
    }
}
}
function do()
{ $admin=$this->session->userdata('admin');
      $data['fav']=$this->model->favoritelist($admin);
$this->load->model('model');
 $data['abs'] = $this->model->grouplist($admin);
 $data['fav']=$this->model->favoritelist($admin);
      $data['historys'] = $this->model->historylist();

    $data['ac'] = $this->model->countdetail();
    $this->load->view('do');
}

function doit()
{
    $operand1 = $this->input->post('a');
    $operand2 = $this->input->post('b');
    $operator = $this->input->post('c');
    
    switch ($operator)  {
        case '+':
            $result = $operand1 + $operand2;
            break;
        case '-':
            $result = $operand1 - $operand2;
            break;
        case '*':
            $result = $operand1 * $operand2;
            break;
        case '/':
            $result = $operand1 / $operand2;
            break;
        case '%':
            $result = ($operand1 * $operand2) / 100;
            break;
        default:
            $result = "Invalid operator";
    }
    $this->load->model('model');
$this->model->save_result($operand1,$operand2,$operator,$result);

    echo json_encode($result);
}

        }            