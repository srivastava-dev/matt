<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\EmployeeModel;
use CodeIgniter\HTTP\RequestInterface;
use App\Models\StudentModel;
use App\Models\UserInfoModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    
class Home extends BaseController
{
    protected $session;


    function __construct()
    {

        $this->session = \Config\Services::session();
        $this->session->start();


    }
    public function index()
    {
        helper(['form']);
        $session = session();
        if ($session->get('logged_in')) {
            redirect('dashboard');
        } else {
            return view('login');
        }
       // 
    }
    public function validate_credentials() {
        helper(['form']);
        $session = session();
        $model = new EmployeeModel();
        $email = $this->request->getVar('username');
         $password = $this->request->getVar('password');

        $rules = [
            'email'         => 'required|min_length[6]|max_length[50]|valid_email',
            'password'      => 'required|min_length[4]|max_length[200]'
           // 'confpassword'  => 'matches[password]'
        ];
        $data = $model->where('email', $email)->first();
       
         if($data){
             $pass = $data['password'];
             if($pass==$password){
                 $ses_data = [
                     'user_id'       => $data['id'],
                     'user_name'     => $data['email'],
                     'role'    => $data['role'],
                     'logged_in'     => TRUE
                 ];
                 $session->set($ses_data);
                 return redirect()->to('/dashboard');
                
             }
             else{
                 $session->setFlashdata('msg', 'Wrong Password');
                 return redirect()->to('/');
             }
            }
        else{
            $session->setFlashdata('msg', 'Email not Found');
             return redirect()->to('/');
        }
    }
    public function dashboard()
    {
        $session = session();
        //echo "Welcome back, ".$session->get('user_name');
        return  view('header')
        .view('dashboard');
    }
    public function logout()
     {
         $session = session();
         $session->destroy();
         return redirect()->to('/');
     }
     public function register()
     {
        $session = session();
        helper(['form']);

        return view('register');
     }
     public function register_validate()
     {
        helper(['form']);
        $model = new EmployeeModel();
        $db      = \Config\Database::connect();
        $builder = $db->table('employees');
        $name = $this->request->getVar('name');
        $email = $this->request->getVar('username');
         $password = $this->request->getVar('password');

        $rules = [
            'email'         => 'required|min_length[6]|max_length[50]|valid_email',
            'password'      => 'required|min_length[4]|max_length[200]',
            'name'          => 'required'
           // 'confpassword'  => 'matches[password]'
        ];
        $data = $model->where('email', $email)->first();
       
         if($data){
          
            $session->setFlashdata('msg', 'Username already present');
            return redirect()->to('register');
            }
        else{
           // $session->setFlashdata('msg', 'Email not Found');
           $list = [
            'name'			    => 'admin',
            'email'			    => $email,
            'password'			=> $password,
        ];
        $result 	= $builder->insert($list);
             return redirect()->to('/');
        }
        return redirect()->to('/');
     }
     public function upload_excel($id){
        $data['result'] = $id;  
        return view('header')
        .view('upload',$data);
     }
     public function department(){
        $db      = \Config\Database::connect();
        $builder = $db->table('group_name');
        $model = new UserInfoModel();
        //$builder = $db->table('users');
        $query   = $builder->get(); 
        $query   = $query->getResultArray();
        //var_dump($query); 
        $data['result'] = $query;
        return view('header')    
        .view('department',$data);
     }
    //  public function department(){
    //     return view('department');
    //  }
     public function listing(){
        return view('listing');
     }
     public function edit_groupinfo($id){
        $db      = \Config\Database::connect();
        $builder = $db->table('group_info');
        $builder->where('Groupid', $id);
        $query   = $builder->get(); 
        $query   = $query->getResultArray();
        // var_dump($id); 
        // echo $this->db->last_query();
        // var_dump($query); 
        $data['result'] = $query;   
        return view('header')
        .view('editgroupinfo',$data);
     }
     public function importCsvToDb()
     {
        $id = $this->request->getVar('id');
        $db      = \Config\Database::connect();
        $builder = $db->table('group_info');
        $model = new UserInfoModel();
        $path 			= 'documents/users/';
		$json 			= [];
		$file_name 		= $this->request->getFile('file');
		$file_name 		= $this->uploadFile($path, $file_name);
		$arr_file 		= explode('.', $file_name);
		$extension 		= end($arr_file);
		if('csv' == $extension) {
			$reader 	= new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		} else {
			$reader 	= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		}
		$spreadsheet 	= $reader->load($file_name);
		$sheet_data 	= $spreadsheet->getActiveSheet()->toArray();

		$list 			= [];
		foreach($sheet_data as $key => $val) {
			if($key != 0) {
			
			
					$list [] = [
						'G_Id'					=> $val[2],
						'Name'			=> $val[1],
						'Date'				=> $val[4],
						'Description'					=> $val[5],
						'istrue'					=> $val[4],
						'Department_code'			=> $val[3],
						'Date_new'                   => $val[4],
                        'Result'                       => $val[7],
                        'Groupid'          => $id
					];
				
			}
		}

		if(file_exists($file_name))
			unlink($file_name);
		if(count($list) > 0) {
			$result 	= $builder->insertBatch($list);
			if($result) {
				
			} else {
				
			}
		} else {
			
		}
        return redirect()->to('add');
		//echo json_encode($json);
	}

	public function uploadFile($path, $image) {
    	if (!is_dir($path)) 
			mkdir($path, 0777, TRUE);
		if ($image->isValid() && ! $image->hasMoved()) {
			$newName = $image->getRandomName();
			$image->move('./'.$path, $newName);
			return $path.$image->getName();
		}
		return "";
	}

    public function group_add(){
        $db      = \Config\Database::connect();
        $builder = $db->table('group_name');

        return view('header')
        .view('groupadd');
    }
    public function groupvalidate(){
        $db      = \Config\Database::connect();
        $builder = $db->table('group_name');
        $name = $this->request->getVar('groupname');
        $list = [
            'name'			    => $name
        ];
        $result 	= $builder->insert($list);
             return redirect()->to('/add');
    }
}
