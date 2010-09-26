<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Musica_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function create(){
        $data = array(
            'filename'   => $_POST['txtName'],
            'order'      => $this->_get_num_order(TBL_MUSIC),
            'date_added' => date('Y-m-d H:i:s')
        );
        return $this->db->insert(TBL_MUSIC, $data);
    }

    public function edit(){
        $data = array(
            'content'       => $_POST['content'],
            'last_modified' => date('Y-m-d H:i:s')
        );
        $this->db->where('reference', $_POST['reference']);
        return $this->db->update(TBL_CONTENTS, $data);
    }

    public function get_list(){
        $this->db->order_by('order', 'asc');
        return $this->db->get_Where(TBL_MUSIC);
    }

    /* PRIVATE FUNCTIONS
     **************************************************************************/
    private function _get_num_order($tbl_name){
        $this->db->select_max('`order`');
        $row = $this->db->get($tbl_name)->row_array();
        return is_null($row['order']) ? 1 : $row['order']+1;
    }
    
}
?>