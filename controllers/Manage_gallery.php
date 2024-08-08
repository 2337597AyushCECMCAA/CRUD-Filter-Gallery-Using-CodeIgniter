<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Manage_gallery extends CI_Controller { 
     
    function __construct() { 
        parent::__construct(); 
         
        
        $this->load->model('image'); 
         
        $this->load->helper('form'); 
        $this->load->library('form_validation'); 
         
         
        $this->controller = 'manage_gallery'; 
         
         
        $this->uploadPath = 'uploads/images/'; 
    } 
     
    public function index(){ 
        $data = array(); 
         
        
        if($this->session->userdata('success_msg')){ 
            $data['success_msg'] = $this->session->userdata('success_msg'); 
            $this->session->unset_userdata('success_msg'); 
        } 
        if($this->session->userdata('error_msg')){ 
            $data['error_msg'] = $this->session->userdata('error_msg'); 
            $this->session->unset_userdata('error_msg'); 
        } 
 
        $data['gallery'] = $this->image->getRows(); 
        $data['title'] = 'Images Archive'; 
         
        
        $this->load->view('templates/header', $data); 
        $this->load->view($this->controller.'/index', $data); 
        $this->load->view('templates/footer'); 
    } 
     
    public function view($id){ 
        $data = array(); 
         
         
        if(!empty($id)){ 
            $con = array('id' => $id); 
            $data['image'] = $this->image->getRows($con); 
            
            if (!isset($data['image']['division'])) {
                $data['image']['division'] = 'Unknown'; // Default value if division is not available
            }

            $data['title'] = $data['image']['title'];  
             
            
            $this->load->view('templates/header', $data); 
            $this->load->view($this->controller.'/view', $data); 
            $this->load->view('templates/footer'); 
        } else { 
            redirect($this->controller); 
        } 
    } 
     
    public function add(){ 
        $data = $imgData = array(); 
        $error = ''; 
         
        // If add request is submitted 
        if($this->input->post('imgSubmit')){ 
             
            $this->form_validation->set_rules('title', 'image title', 'required'); 
            $this->form_validation->set_rules('division', 'division', 'required'); 
            $this->form_validation->set_rules('image', 'image file', 'callback_file_check'); 
             
            // Prepare gallery data 
            $imgData = array( 
                'title' => $this->input->post('title'),
                'division' => $this->input->post('division') 
            ); 
             
            // Validate submitted form data 
            if($this->form_validation->run() == true){ 
                
                if(!empty($_FILES['image']['name'])){ 
                    $imageName = $_FILES['image']['name']; 
                     
                     
                    $config['upload_path'] = $this->uploadPath; 
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                     
                     
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                     
                    if($this->upload->do_upload('image')){ 
                         
                        $fileData = $this->upload->data(); 
                        $imgData['file_name'] = $fileData['file_name']; 
                    } else { 
                        $error = $this->upload->display_errors();  
                    } 
                } 
                 
                if(empty($error)){ 
                    // Insert image data 
                    $insert = $this->image->insert($imgData); 
                     
                    if($insert){ 
                        $this->session->set_userdata('success_msg', 'Image has been uploaded successfully.'); 
                        redirect(base_url().'manage_gallery/index'); 
                    } else { 
                        $error = 'Some problems occurred, please try again.'; 
                    } 
                } 
                 
                $data['error_msg'] = $error; 
            } 
        } 
         
        $data['image'] = $imgData; 
        $data['title'] = 'Upload Image'; 
        $data['action'] = 'Upload'; 
         
        // Load the add page view 
        $this->load->view('templates/header', $data); 
        $this->load->view($this->controller.'/add_edit', $data); 
        $this->load->view('templates/footer'); 
    } 
     
    public function edit($id){ 
        $data = $imgData = array(); 
         
        // Get image data 
        $con = array('id' => $id); 
        $imgData = $this->image->getRows($con); 
        $prevImage = $imgData['file_name']; 
         
        
        if($this->input->post('imgSubmit')){ 
             
            $this->form_validation->set_rules('title', 'gallery title', 'required'); 
            $this->form_validation->set_rules('division', 'division', 'required'); 
             
            // Prepare gallery data 
            $imgData = array( 
                'title' => $this->input->post('title'),
                'division' => $this->input->post('division')
            ); 
             
            // Validate submitted form data 
            if($this->form_validation->run() == true){ 
                 
                if(!empty($_FILES['image']['name'])){ 
                    $imageName = $_FILES['image']['name']; 
                     
                    // File upload configuration 
                    $config['upload_path'] = $this->uploadPath; 
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('image')){ 
                         
                        $fileData = $this->upload->data(); 
                        $imgData['file_name'] = $fileData['file_name']; 
                         
                        // Remove old file from the server  
                        if(!empty($prevImage)){ 
                            @unlink($this->uploadPath.$prevImage);  
                        } 
                    } else { 
                        $error = $this->upload->display_errors();  
                    } 
                } 
                 
                if(empty($error)){ 
                    // Update image data 
                    $update = $this->image->update($imgData, $id); 
                     
                    if($update){ 
                        $this->session->set_userdata('success_msg', 'Image has been updated successfully.'); 
                        redirect($this->controller); 
                    } else { 
                        $error = 'Some problems occurred, please try again.'; 
                    } 
                } 
                 
                $data['error_msg'] = $error; 
            } 
        } 
         
        $data['image'] = $imgData; 
        $data['title'] = 'Update Image'; 
        $data['action'] = 'Edit'; 
         
        // Load the edit page view 
        $this->load->view('templates/header', $data); 
        $this->load->view($this->controller.'/add_edit', $data); 
        $this->load->view('templates/footer'); 
    } 
     
    public function block($id){ 
        
        if($id){ 
            // Update image status 
            $data = array('status' => 0); 
            $update = $this->image->update($data, $id); 
             
            if($update){ 
                $this->session->set_userdata('success_msg', 'Image has been blocked successfully.'); 
            } else { 
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.'); 
            } 
        } 
 
        redirect($this->controller); 
    } 
     
    public function unblock($id){ 
         
        if($id){ 
            // Update image status 
            $data = array('status' => 1); 
            $update = $this->image->update($data, $id); 
             
            if($update){ 
                $this->session->set_userdata('success_msg', 'Image has been activated successfully.'); 
            } else { 
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.'); 
            } 
        } 
 
        redirect($this->controller); 
    } 
     
    public function delete($id){ 
        
        if($id){ 
            $con = array('id' => $id); 
            $imgData = $this->image->getRows($con); 
             
            // Delete gallery data 
            $delete = $this->image->delete($id); 
             
            if($delete){ 
                // Remove file from the server  
                if(!empty($imgData['file_name'])){ 
                    @unlink($this->uploadPath.$imgData['file_name']);  
                }  
                 
                $this->session->set_userdata('success_msg', 'Image has been removed successfully.'); 
            } else { 
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.'); 
            } 
        } 
 
        redirect(base_url().'manage_gallery/index'); 
    } 
     
    public function file_check($str){ 
        if(empty($_FILES['image']['name'])){ 
            $this->form_validation->set_message('file_check', 'Select an image file to upload.'); 
            return FALSE; 
        } else { 
            return TRUE; 
        } 
    } 
}
