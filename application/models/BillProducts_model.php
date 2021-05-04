<?php
class BillProducts_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function set_billProducts($billId)
    {

        $this->load->helper('url');

        $data = array(
            'product' => $this->input->post('product'),
            'qty' => $this->input->post('qty'),
            'price' => $this->input->post('price'),
            'bill_id' => $billId
        );

        return $this->db->insert('bill_products', $data);
    }
}
