<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FeedbackModel extends CI_Model
{
    protected $table = 'testimonios';

    public function saveFeedback($data)
    {
        return $this->db->insert($this->table, $data);
    }
}
