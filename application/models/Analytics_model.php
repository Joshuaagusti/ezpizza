<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analytics_model extends CI_Model {

    public function get_sales_overview() {
        return $this->db->get('vw_sales_overview')->result();
    }

    public function get_top_products($limit = 10) {
        $this->db->select('*')
                 ->from('vw_product_performance')
                 ->order_by('times_ordered', 'DESC')
                 ->limit($limit);
        return $this->db->get()->result();
    }

    public function get_customer_insights($limit = 20) {
        $this->db->select('*')
                 ->from('vw_customer_insights')
                 ->order_by('total_spent', 'DESC')
                 ->limit($limit);
        return $this->db->get()->result();
    }

    public function get_testimonial_analysis() {
        return $this->db->get('vw_testimonial_analysis')->result();
    }

    public function get_discount_effectiveness() {
        return $this->db->get('vw_discount_effectiveness')->result();
    }
}