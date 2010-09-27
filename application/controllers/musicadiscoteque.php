<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Musicadiscoteque extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->library('dataview', array(
            'tlp_title'            => TITLE_MUSIC_DISCOTEQUE,
            'tlp_meta_description' => META_DESCRIPTION_MUSIC_DISCOTEQUE,
            'tlp_meta_keywords'    => META_KEYWORDS_MUSIC_DISCOTEQUE
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
            'tlp_section'        => 'frontpage/musicadiscoteque_view.php',
            'tlp_title_section'  => '',
            'content'            => $this->contents_model->get_content('musica-discoteque')
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }


    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}