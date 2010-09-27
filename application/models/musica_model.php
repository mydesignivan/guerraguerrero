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
            'name    '   => trim($_POST['txtName']),
            'filename'   => $filename,
            'order'      => $this->_get_num_order(TBL_MUSIC),
            'date_added' => date('Y-m-d H:i:s')
        );
        return $this->db->insert(TBL_MUSIC, $data);
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

    /* PUBLIC FUNCTIONS (LLAMADAS POR AJAX)
     **************************************************************************/
    public function order(){
        $initorder = $_POST['initorder'];
        $rows = json_decode($_POST['rows']);

        $res = $this->db->query('SELECT `order` FROM '.TBL_MUSIC.' WHERE id='.$initorder)->row_array();
        $order = $res['order'];

        //print_array($rows, true);
        foreach( $rows as $row ){
            $id = substr($row, 2);
            $this->db->where('id', $id);
            if( !$this->db->update(TBL_MUSIC, array('order' => $order)) ) return false;
            $order++;
        }

        return true;
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