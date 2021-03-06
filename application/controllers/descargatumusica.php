<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Descargatumusica extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->library('dataview', array(
            'tlp_title'            => TITLE_DESCARGA,
            'tlp_meta_description' => META_DESCRIPTION_DESCARGA,
            'tlp_meta_keywords'    => META_KEYWORDS_DESCARGA
        ));
        $this->_data = $this->dataview->get_data();
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->load->model('contents_model');
        $this->load->model('musica_model');
        $this->_data = $this->dataview->set_data(array(
            'tlp_section'        => 'frontpage/descargatumusica_view.php',
            'tlp_title_section'  => '',
            'content'            => $this->contents_model->get_content('descargar-tu-musica'),
            'list'               => $this->musica_model->get_list()
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }


    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}