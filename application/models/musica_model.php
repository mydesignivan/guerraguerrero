<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Musica_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
        $this->filescopy=array();
    }

    /* PUBLIC PROPERTIES
     **************************************************************************/
    public $filescopy;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function create($filename){
        $this->db->trans_start(); // INICIO TRANSACCION

        $data = array(
            'name    '   => trim($_POST['txtName']),
            'filename'   => $filename,
            'order'      => $this->_get_num_order(TBL_MUSIC),
            'date_added' => date('Y-m-d H:i:s')
        );
        $insert = $this->db->insert(TBL_MUSIC, $data);

        $this->db->trans_complete(); // COMPLETO LA TRANSACCION

        return $insert;
    }

    public function edit($filename){
        $this->db->trans_start(); // INICIO TRANSACCION

        $data = array(
            'name    '      => trim($_POST['txtName']),
            'last_modified' => date('Y-m-d H:i:s')
        );
        if( !empty($filename) ) {
            $data['filename'] = $filename;
            @unlink(UPLOAD_PATH_MP3 . $_POST['mp3old']);
        }
        $this->db->where('id', $_POST['id']);
        $update = $this->db->update(TBL_MUSIC, $data);

        $this->db->trans_complete(); // COMPLETO LA TRANSACCION

        return $update;
    }

    public function delete($id){
        $this->db->trans_begin();

        $arr_files = $this->_get_filenames($id);
        $this->db->where_in('id', $id);
        if( $this->db->delete(TBL_MUSIC) ){
            foreach( $arr_files as $row ){
                @unlink(UPLOAD_PATH_MP3 . $row['filename']);
            }
        }else {
            $this->db->trans_rollback();
            return false;
        }

        $this->db->trans_commit();
        return true;
    }

    public function get_list($where_in=array()){
        $this->db->order_by('order', 'asc');
        return $this->db->get_where(TBL_MUSIC);
    }

    public function get_list_import(){
        $this->load->helper('directory');
        return directory_map(UPLOAD_PATH_MP3IMPORT);
    }

    public function get_info($id){
        return $this->db->get_where(TBL_MUSIC, array('id'=>$id))->row_array();
    }

    public function import(){
        $this->db->trans_start(); // INICIO TRANSACCION
        $n=0;
        foreach( $_POST['txtName'] as $name ){
            $name = urldecode($name . $_POST['ext'][$n]);
            $filename = normalize_filename($name);
            $data = array(
                'name'       => $name,
                'filename'   => $filename,
                'order'      => $this->_get_num_order(TBL_MUSIC),
                'date_added' => date('Y-m-d H:i:s')
            );

            if( !$this->db->insert(TBL_MUSIC, $data) ) return false;

            $path1 = UPLOAD_PATH_MP3IMPORT . $name;
            $path2 = UPLOAD_PATH_MP3 . $filename;

            $this->filescopy[] = $path2;
            if( !copy($path1, $path2) ) return false;
            else @unlink($path1);
            $n++;
        }

        $this->db->trans_complete(); // COMPLETO LA TRANSACCION

        return true;
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