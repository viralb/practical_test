<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->date_time = $this->common_model->currnet_datetime();
	}

	public function index()
	{
		$header["title"] = "Events";

		$this->common_model->common_header($header);
		$this->common_model->common_sidebar();
		$this->load->view('welcome_message');
		$this->common_model->common_footer();
	}

	public function event_list()
	{

		$header["title"] = "Event(s) List";

		$footer["datatables"] = "set_datatable";

		$column = "tbl_events.fld_events_id,fld_events_title,fld_start_date,fld_end_date,fld_recurrence,fld_recurrence_type_name";
		//$join = array("tbl_recurrence_type,left"=>"tbl_recurrence_type.fld_events_id = tbl_events.fld_events_id");

		$data["events_info"] = $this->common_model->record_list("tbl_events",$column);
		//echo $this->db->last_query();exit;
		$this->common_model->common_header($header);
		$this->common_model->common_sidebar();
		$this->load->view('event_list',$data);
		$this->common_model->common_footer($footer);
	}

	public function add_event()
	{
		if($this->input->post())
		{
			$post_data = $this->input->post();

			$event_title = $post_data["event_title"];
			$start_date = date("Y-m-d",strtotime($post_data["start_date"]));
			$end_date = date("Y-m-d",strtotime($post_data["end_date"]));
			$recurrence = $post_data["recurrence"];

			$event_repeat = $lstRepeatType = $lstEvery = $lstRepeatOn = $lstRepeatWeek = $lstRepeatMonth = "";
			if($recurrence == 1)
			{
				$lstRepeatType = $post_data["lstRepeatType"];
				$lstEvery = $post_data["lstEvery"];

				$event_repeat = $lstRepeatType.'-'.$lstEvery;
			}
			else
			{
				$lstRepeatOn = $post_data["lstRepeatOn"];
				$lstRepeatWeek = $post_data["lstRepeatWeek"];
				$lstRepeatMonth = $post_data["lstRepeatMonth"];

				$event_repeat = $lstRepeatOn.'-'.$lstRepeatWeek.'-'.$lstRepeatMonth;
			}

			$add_arr = array("fld_events_title"=>$event_title,"fld_start_date"=>$start_date,"fld_end_date"=>$end_date,"fld_recurrence"=>$recurrence,"fld_recurrence_type_name"=>$event_repeat,"created_datetime"=>$this->date_time);
//echo "<pre>";print_r($add_arr);exit;
			$last_id = $this->common_model->add_record_with_last_insertid("tbl_events",$add_arr);

			if($last_id > 0)
			{
				$this->session->set_flashdata('success', 'Record has been successfully created.');
				redirect('event_list', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('error', 'Error in adding record. Please try again');
				redirect('event_list', 'refresh');
			}

		}
		else
		{
			$header["title"] = "Add Event";
			$footer["datepicker"] = "set_datepicker";

			$this->common_model->common_header($header);
			$this->common_model->common_sidebar();
			$this->load->view('add_event');
			$this->common_model->common_footer($footer);
		}
	}

	public function edit_event($id = "")
	{
		if($this->input->post())
		{
			$post_data = $this->input->post();

			$event_title = $post_data["event_title"];
			$start_date = date("Y-m-d",strtotime($post_data["start_date"]));
			$end_date = date("Y-m-d",strtotime($post_data["end_date"]));
			$recurrence = $post_data["recurrence"];

			$event_repeat = $lstRepeatType = $lstEvery = $lstRepeatOn = $lstRepeatWeek = $lstRepeatMonth = "";
			if($recurrence == 1)
			{
				$lstRepeatType = $post_data["lstRepeatType"];
				$lstEvery = $post_data["lstEvery"];

				$event_repeat = $lstRepeatType.'-'.$lstEvery;
			}
			else
			{
				$lstRepeatOn = $post_data["lstRepeatOn"];
				$lstRepeatWeek = $post_data["lstRepeatWeek"];
				$lstRepeatMonth = $post_data["lstRepeatMonth"];

				$event_repeat = $lstRepeatOn.'-'.$lstRepeatWeek.'-'.$lstRepeatMonth;
			}

			$udpate_arr = array("fld_events_title"=>$event_title,"fld_start_date"=>$start_date,"fld_end_date"=>$end_date,"fld_recurrence"=>$recurrence,"fld_recurrence_type_name"=>$event_repeat,"updated_datetime"=>$this->date_time);
			$where = array("fld_events_id"=>$id);
			$status = $this->common_model->update_record("tbl_events",$udpate_arr,$where);

			if($status)
			{
				$this->session->set_flashdata('success', 'Record has been successfully updated.');
				redirect('event_list', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('error', 'Error in updating record. Please try again');
				redirect('event_list', 'refresh');
			}

		}
		else
		{
			if($id != "")
			{
				$column = "*";
				$where = array("fld_events_id"=>$id);
				$data["get_record"] = $this->common_model->record_list("tbl_events",$column,$where,"","row");
				//echo "<pre>";print_r($data);exit;
				if(!empty($data["get_record"]))
				{
					$header["title"] = "Edit Event";
					$footer["datepicker"] = "set_datepicker";

					$this->common_model->common_header($header);
					$this->common_model->common_sidebar();
					$this->load->view('edit_event',$data);
					$this->common_model->common_footer($footer);
				}
				else
				{
					$this->session->set_flashdata('error', 'No record found.');
					redirect('event_list', 'refresh');
				}
			}
			else
			{
				$this->session->set_flashdata('error', 'No record found.');
				redirect('event_list', 'refresh');
			}
		}
	}

	public function delete_event()
	{
		if($this->input->post())
		{
			if($this->input->post("event_id"))
			{
				$event_id = $this->input->post("event_id");

				$column = "COUNT(*) AS tot_count";
				$where = array("fld_events_id"=>$event_id);
				$get_record = $this->common_model->record_list("tbl_events",$column,$where,"","row");

				if((!empty($get_record)) && ($get_record["tot_count"] > 0))
				{
					$this->db->where("fld_events_id",$event_id);
					$this->db->delete("tbl_events");

					$this->session->set_flashdata('success', 'Record has been successfully deleted.');

					$send_status = array("success"=>"yes");
					echo json_encode($send_status);
					exit;
				}
				else
				{
					$this->session->set_flashdata('error', 'No record found.');

					$send_status = array("error"=>"yes.");
					echo json_encode($send_status);
					exit;
				}
			}
			else
			{
				$send_status = array("error"=>"No record found.");
				echo json_encode($send_status);
				exit;
			}

		}
	}

	public function view_event($id = "")
	{

		if($id != "")
		{
			$column = "*";
			$where = array("fld_events_id"=>$id);
			$data["get_record"] = $this->common_model->record_list("tbl_events",$column,$where,"","row");
			//echo "<pre>";print_r($data);exit;
			if(!empty($data["get_record"]))
			{
				$header["title"] = "View Event";
				$footer["datatables"] = "set_datatable";

				$this->common_model->common_header($header);
				$this->common_model->common_sidebar();
				$this->load->view('event_view',$data);
				$this->common_model->common_footer($footer);
			}
			else
			{
				$this->session->set_flashdata('error', 'No record found.');
				redirect('event_list', 'refresh');
			}
		}
		else
		{
			$this->session->set_flashdata('error', 'No record found.');
			redirect('event_list', 'refresh');
		}

	}
}
