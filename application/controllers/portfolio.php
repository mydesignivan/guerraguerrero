<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Portfolio extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->library('dataview', array(
            'tlp_title'            => TITLE_PORTFOLIO,
            'tlp_meta_description' => META_DESCRIPTION_PORTFOLIO,
            'tlp_meta_keywords'    => META_KEYWORDS_PORTFOLIO
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
            'tlp_section'        => 'frontpage/portfolio_view.php',
            'tlp_title_section'  => '',
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }


    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}