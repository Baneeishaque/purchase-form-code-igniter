<?php
class Purchase extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('vendor_model');
        $this->load->model('bill_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['vendors'] = $this->vendor_model->get_vendors();

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('product', 'Product Name', 'required');
        $this->form_validation->set_rules('qty', 'Qty.', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');

        if ($this->form_validation->run() === FALSE) {

            $this->load->view('purchase/index', $data);

        } else {

            $this->bill_model->set_bill();
            $this->load->view('purchase/success');
        }
    }

    public function getVendor($id)
    {

        // $data['vendors'] = $this->vendor_model->get_vendors($id);
        // echo json_encode($data);
        $vendor=$this->vendor_model->get_vendors($id);
        echo $vendor['gst_no']."-".$vendor['tax'];
    }
}
