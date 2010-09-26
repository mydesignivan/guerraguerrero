<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Index extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->library("simplelogin");
        $this->load->library('dataview', array(
            'tlp_section'        =>  'panel/login_view.php',
            'tlp_title'          =>  TITLE_INDEX,
            'tlp_title_section'  => ""
        ));
        $this->_data = $this->dataview->get_data();
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        if( $this->session->userdata('logged_in') ) {
            redirect('/panel/contents/');
        }else{
            $this->load->view('template_frontpage_view', $this->_data);
        }
    }

    public function login(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $statusLogin = $this->simplelogin->login($_POST["txtUser"], $_POST["txtPass"]);
            
            if( $statusLogin['status']=="error" ){
                $this->session->set_flashdata('loginfaild', true);
                redirect('/panel/');
            }else{
                redirect('/panel/musica/');
            }
        }
    }

    public function logout(){
        $this->simplelogin->logout();
        redirect($this->config->item('base_url'));
    }


    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/
}