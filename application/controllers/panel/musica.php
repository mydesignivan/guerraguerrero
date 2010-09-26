<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Musica extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        if( !$this->session->userdata('logged_in') ) redirect($this->config->item('base_url'));

        $this->load->model('musica_model');
        $this->load->library('dataview', array(
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
        $this->_data = $this->dataview->set_data(array(
            'tlp_section'        => 'panel/musica_list_view.php',
            'tlp_script'         => array('plugins_jqui_sortable', 'helpers_json', 'class_music_list'),
            'list'               => $this->musica_model->get_list()
        ));
        $this->load->view('template_paneladmin_view', $this->_data);
    }

    public function form(){
        $this->_data = $this->dataview->set_data(array(
            'tlp_section'        => 'panel/musica_form_view.php',
            'tlp_script'         => array('class_music_form'),
        ));
        $this->load->view('template_paneladmin_view', $this->_data);

    }

    public function create(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            if( is_uploaded_file($_FILES['txtFileName']) ){
                if( $this->musica_model->create() ){
                    $filename = $this->_get_filename($_FILES['txtFileName']);
                    move_uploaded_file($_FILES['txtFileName']['tmp_name'][$n], UPLOAD_PATH_MP3 . $filename);
                }else{
                    $this->session->set_flashdata('status', 'error');
                    $this->session->set_flashdata('message', 'El archivo no ha podido llegar al servidor.');
                    redirect('/panel/musica/form');
                }

            }else{
                $this->session->set_flashdata('status', 'error');
                $this->session->set_flashdata('message', 'El archivo no ha podido llegar al servidor.');
                redirect('/panel/musica/form');
            }
            redirect('/panel/musica/');
        }
    }


    /* AJAX FUNCTIONS
     **************************************************************************/
    public function ajax_order(){
        die($this->musica_model->order() ? "success" : "error");
    }

    /* PRIVATE FUNCTIONS
     **************************************************************************/
    private function _get_filename($text){
        $separator = "_";

        $isUTF8 = (mb_detect_encoding($text." ",'UTF-8,ISO-8859-1') == 'UTF-8');

        $text = ($isUTF8) ? utf8_decode($text) : $text;
        $text = trim($text);

        $_a = utf8_decode("ÁÀãâàá");
        $_e = utf8_decode("ÉÈéè");
        $_i = utf8_decode("ÍÌíì");
        $_o = utf8_decode("ÓÒóò");
        $_u = utf8_decode("ÚÙúù");
        $_n = utf8_decode("Ññ");
        $_c = utf8_decode("Çç");
        $_b = utf8_decode("ß");
        $_dash = "\,_ ";

        $text = preg_replace("/[$_a]/", "a", $text );
        $text = preg_replace("/[$_e]/", "e", $text );
        $text = preg_replace("/[$_i]/", "i", $text );
        $text = preg_replace("/[$_o]/", "o", $text );
        $text = preg_replace("/[$_u]/", "u", $text );
        $text = preg_replace("/[$_n]/", "n", $text );
        $text = preg_replace("/[$_c]/", "c", $text );
        $text = preg_replace("/[$_b]/", "ss", $text );

        $text = preg_replace("/[$_dash]/", $separator, $text );
        $text = preg_replace("/[^a-zA-Z0-9\-]!=./", "", $text );

        $text = strtolower($text);

        $text = ($isUTF8) ? utf8_encode($text) : $text;

        return uniqid(time()) ."__". $text;
    }
}