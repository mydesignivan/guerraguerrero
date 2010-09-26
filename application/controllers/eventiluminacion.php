<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Eventiluminacion extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->library('dataview', array(
            'tlp_title'            => TITLE_EVENT_ILUMINACION,
            'tlp_meta_description' => META_DESCRIPTION_ILUMINACION,
            'tlp_meta_keywords'    => META_KEYWORDS_ILUMINACION
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
        $this->_data = $this->dataview->set_data(array(
            'tlp_section'        => 'frontpage/eventiluminacion_view.php',
            'tlp_title_section'  => '',
            'content'            => $this->contents_model->get_content('eventos-iluminacion')
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }


    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}