<?php

/**
 * Created by PhpStorm.
 * User: Godluck Akyoo
 * Date: 12-Apr-17
 * Time: 16:27
 */
class FormBuilder extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = "Form Builder";

		$this->load->view("layout/header", $data);
		$this->load->view("formbuilder/form_builder", $data);
		$this->load->view("layout/footer");
	}

	public function save()
	{
		echo json_encode(["status" => "success"]);
	}

	public function update()
	{

	}
}