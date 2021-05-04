<?php
class Bill_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
        $this->load->model('billProducts_model');
    }

    public function set_bill($id = FALSE)
    {
        $this->load->helper('url');

        $data = array(
            'vendor' => $this->input->post('name'),
            'bill_no' => $this->input->post('bill_no'),
            // 'net' => $this->input->post('net')
        );

        $this->db->insert('bills', $data);

        return $this->billProducts_model->set_billProducts($this->input->post('bill_no'));
    }
}
