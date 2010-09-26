<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Musica_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function create($filename){
        $data = array(
            'filename'   => $filename,
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

    public function delete($id){
        $arr_files = $this->_get_filenames($id);
        $this->db->where_in('id', $id);
        if( $this->db->delete(TBL_MUSIC) ){
            foreach( $arr_files as $row ){
                @unlink(UPLOAD_PATH_MP3 . $row['filename']);
            }
        }else return false;
        return true;
    }

    public function get_list($where_in=array()){
        $this->db->order_by('order', 'asc');
        return $this->db->get_where(TBL_MUSIC);
    }

    /* PRIVATE FUNCTIONS
     **************************************************************************/
    private function _get_num_order($tbl_name){
        $this->db->select_max('`order`');
        $row = $this->db->get($tbl_name)->row_array();
        return is_null($row['order']) ? 1 : $row['order']+1;
    }

    private function _get_filenames($id){
        $this->db->where_in('id', $id);
        $query = $this->db->get_where(TBL_MUSIC);
        return $query->result_array();
    }
    
}
?>