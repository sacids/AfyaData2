<?php

/**
 * Created by PhpStorm.
 * User: renfrid
 * Date: 4/12/17
 * Time: 10:49 AM
 */
class Migration extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->input->is_cli_request())
            show_404();
        $this->load->library("migration");
        $this->load->dbforge();
    }

    public function latest()
    {
        if ($this->migration->current() === FALSE) {
            echo $this->migration->error_string();
        }
        $this->migration->latest();
        echo $this->migration->error_string();
    }
}