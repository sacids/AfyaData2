<?php
/**
 * Created by PhpStorm.
 * User: Godluck Akyoo
 * Date: 12-Apr-17
 * Time: 16:35
 */

if (!function_exists("display_message")) {
	function display_message($message, $message_type = "success")
	{
		if ($message_type == "success") {
			return '<div class="alert alert-success"><i class="fa fa-check text-success"></i> ' . $message . '</div>';
		}

		if ($message_type == "info") {
			return '<div class="alert alert-info"><i class="fa fa-info text-info"></i> ' . $message . '</div>';
		}

		if ($message_type == "warning") {
			return '<div class="alert alert-warning"><i class="fa fa-warning text-warning"></i> ' . $message . '</div>';
		}

		if ($message_type == "danger" || $message_type == "error") {
			return '<div class="alert alert-danger"><i class="fa fa-warning text-danger"></i> ' . $message . '</div>';
		}
	}
}

if (!function_exists("get_flashdata")) {
	function get_flashdata()
	{
		$CI = &get_instance();
		return (($CI->session->flashdata("msg") != "")) ? $CI->session->flashdata("msg") : "";
	}
}

if (!function_exists("set_flashdata")) {
	function set_flashdata($flash_message)
	{
		$CI = &get_instance();
		$CI->session->set_flashdata("msg", $flash_message);
	}
}