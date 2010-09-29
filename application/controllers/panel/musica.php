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
        $this->_filename='';
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;
    private $_filename;

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
        $id = $this->uri->segment(4);
        $data = array(            
            'tlp_section' => 'panel/musica_form_view.php',
            'tlp_script'  => array('class_music_form')
        );
        if( is_numeric($id) ){
            $data['info'] = $this->musica_model->get_info($id);
        }
        $this->_data = $this->dataview->set_data($data);
        $this->load->view('template_paneladmin_view', $this->_data);
    }

    public function form_import(){
        $this->_data = $this->dataview->set_data(array(
            'tlp_section' => 'panel/musica_importar_view.php',
            'tlp_script'  => array('class_music_import'),
            'list'        => $this->musica_model->get_list_import()
        ));
        $this->load->view('template_paneladmin_view', $this->_data);
    }

    public function create(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            //print_array($_FILES,true);
            if( $this->_uploadmp3() ){
                if( !$this->musica_model->create($this->_filename) ){
                    $this->session->set_flashdata('status', 'error');
                    $this->session->set_flashdata('message', 'Los datos no pudieron ser guardados.');
                    @unlink(UPLOAD_PATH_MP3 . $this->_filename);
                    redirect('/panel/musica/form');
                }
            }
            redirect('/panel/musica/');
        }
    }

    public function edit(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            //print_array($_FILES,true);

            if( !empty($_FILES['txtFileName']['tmp_name']) ){
                $this->_uploadmp3();
            }

            if( !$this->musica_model->edit($this->_filename) ){
                $this->session->set_flashdata('status', 'error');
                $this->session->set_flashdata('message', 'Los datos no pudieron ser guardados.');
                @unlink(UPLOAD_PATH_MP3 . $this->_filename);
                redirect('/panel/musica/form');
            }
            redirect('/panel/musica/');
        }
    }

    public function delete(){
        if( $this->uri->segment(4) ){
            $id = $this->uri->segment_array();
            array_splice($id, 0,3);
            $res = $this->musica_model->delete($id);

            $this->session->set_flashdata('status', $res ? "success" : "error");

            redirect('/panel/musica /');
        }
    }

    public function import(){
        if( !$this->musica_model->import() ){
            $this->session->set_flashdata('status', 'error');
            $this->session->set_flashdata('message', 'Los datos no pudieron ser guardados.');

            foreach( $this->musica_model->filescopy as $filename ){
                @unlink(UPLOAD_PATH_MP3 . $filename);
            }

            redirect('/panel/musica/form_import');
        }
        redirect('/panel/musica/');
    }


    /* AJAX FUNCTIONS
     **************************************************************************/
    public function ajax_order(){
        die($this->musica_model->order() ? "success" : "error");
    }

    /* PRIVATE FUNCTIONS
     **************************************************************************/
    private function _uploadmp3(){
        if( is_uploaded_file($_FILES['txtFileName']['tmp_name']) ){
            $this->_filename = normalize_filename($_FILES['txtFileName']['name']);
            move_uploaded_file($_FILES['txtFileName']['tmp_name'], UPLOAD_PATH_MP3 . $this->_filename);
            return true;
        }else{
            $this->session->set_flashdata('status', 'error');
            $this->session->set_flashdata('message', 'El archivo no ha podido llegar al servidor.');
            redirect('/panel/musica/form');
        }
        return false;
    }
}