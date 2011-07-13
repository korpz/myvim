<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vim extends CI_Controller {

	public function index()
	{
		$data['title'] = "Compare VIM Commands .com";

		$this->load->model('Vim_model');
		$data['results'] = $this->Vim_model->get_vim_commands();

		$this->load->view('header', $data);
		$this->load->view('board', $data);
		$this->load->view('footer', $data);
	}

	public function plain()
	{
		$this->load->model('Vim_model');
		$id = $this->uri->segment(3,0);
		$data = $this->Vim_model->get_vim_command($id);
		$data = $data[0];

		$this->load->view('boardplain', $data);
	}

	public function view()
	{
		$this->load->model('Vim_model');
		$id = $this->uri->segment(3,0);
		$data['results'] = $this->Vim_model->get_view_vim_command_info($id);

		$this->load->view('header', $data);
		$this->load->view('view', $data);
		$this->load->view('footer', $data);
	}

	public function favorite()
	{
		$this->load->model('Vim_model');
		$id = $this->uri->segment(3,0);
		$data['results'] = $this->Vim_model->save_favorites($id);
		$data['public_msg'] = "Command added to favorites";

		$this->load->view('header', $data);
		$this->load->view('view', $data);
		$this->load->view('footer', $data);
	}

	public function delete()
	{
		$this->load->model('Vim_model');
		$id = $this->uri->segment(3,0);
		$this->Vim_model->delete_command($id);
		$data['results'] = $this->Vim_model->get_vim_commands();
		$data['public_msg'] = "Command Deleted";

		$this->load->view('header', $data);
		$this->load->view('delete', $data);
		$this->load->view('footer', $data);
	}

	public function edit()
	{
		$this->load->library('form');
		$this->load->model('Vim_model');

		$id = $this->uri->segment(3,0);
		$data = $this->Vim_model->get_view_vim_command_info($id);
		/*print_r($data);*/
		$this->form
		->open('', 'myform')
		->fieldset('Submit your command')
		->text('title', 'Title', 'required|max_length[40]', $data[0]->title)
		->text('taginput', 'Tags (, seperated)', '','', '', '')
		->textarea('content', 'Content', 'trim', $data[0]->content, array('style=background:#ffffee', 'style=border:0'))
		->hidden('id', $data[0]->cid )
		->submit();
		// calls a model after the form was submit and validated
		// to run some database queries or do some other stuff
		/*->model('example', 'do_stuff');*/

		// get the form output and write it to the $data array
		// this method automatically validates the form data
		$data['form'] = $this->form->get();

		if ($this->form->valid)
		{
			$post = $this->form->get_post(TRUE);

			unset($post['submit']);

			$tag_post = $post['taginput'];
			unset($post['taginput']);

			$this->Vim_model->command_update($post);
			$id = $this->db->insert_id();

			if("" != $tag_post)
			{
				$tag_array = explode(",", $tag_post);
				if(is_array($tag_array))
				{
					foreach($tag_array as $tag)
					{
						$tag_save['tag_id'] = $this->Vim_model->saveTag($tag);
						$tag_save['command_id'] = $id;
						$this->db->insert('tags_link', $tag_save);
					}
				}
			}

			
			// redirect to success page
			/*redirect('vim/success');*/
		}
		else
		{
			$data['errors'] = $this->form->errors;
		}
		$data['public_message'] = "Command updated";

		$this->load->view('header', $data);
		$this->load->view("edit", $data);
		$this->load->view('footer', $data);
	}

	public function submit()
	{
		$this->load->library('form');
		$this->load->model('Vim_model');

		$this->form
		->open('', 'myform')
		->fieldset('Submit your command')
		->text('title', 'Title', 'required|max_length[40]')
		->text('taginput', 'Tags (, seperated)', '','', '', '')
		->textarea('content', 'Content', 'trim', '', array('style=background:#ffffee', 'style=border:0'))
		->submit();
		// calls a model after the form was submit and validated
		// to run some database queries or do some other stuff
		/*->model('example', 'do_stuff');*/

		// get the form output and write it to the $data array
		// this method automatically validates the form data
		$data['form'] = $this->form->get();

		if ($this->form->valid)
		{
			$post = $this->form->get_post(TRUE);

			unset($post['submit']);

			$tag_post = $post['taginput'];
			unset($post['taginput']);

			$this->db->insert('commands', $post);
			$id = $this->db->insert_id();

			if("" != $tag_post)
			{
				$tag_array = explode(",", $tag_post);
				if(is_array($tag_array))
				{
					foreach($tag_array as $tag)
					{
						$tag_save['tag_id'] = $this->Vim_model->saveTag($tag);
						$tag_save['command_id'] = $id;
						$this->db->insert('tags_link', $tag_save);
					}
				}
			}

			
			// redirect to success page
			/*redirect('vim/success');*/
		}
		else
		{
			$data['errors'] = $this->form->errors;
		}

		$this->load->view('header', $data);
		$this->load->view("submit", $data);
		$this->load->view('footer', $data);
	}

	function success()
	{
		$this->load->view("success");
	}

	function checkSaveTag($tag)
	{
		/*$this->load->model('Vim_model');*/
	}
}
