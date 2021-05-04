<?php
class Vendor_model extends CI_Model
{

        public function __construct()
        {
                $this->load->database();
        }

        public function get_vendors($id = FALSE)
        {
                if ($id === FALSE) {
                        $query = $this->db->get('vendors');
                        return $query->result_array();
                }

                $query = $this->db->get_where('vendors', array('id' => $id));
                return $query->row_array();
        }
}
