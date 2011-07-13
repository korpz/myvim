<?php
class User_model extends CI_Model
{
	function construct()
	{
		parent::__construct();
	}

	function get_vim_commands()
	{
		$query = $this->db->query("
		select * from commands where deleted != '1' order by createDate desc
		");
		return $query->result();
	}

	function get_vim_command($id)
	{
		$query = $this->db->query("
		select content from commands where id = '{$id}'
		");
		return $query->result();
	}

	function command_update($post)
	{
		$query = $this->db->query("
		update commands set content = '{$post['content']}', title='{$post['title']}' where id = '{$post['id']}'
		");
	}

	function add_favorites($id)
	{
		$query = $this->db->query("
		select * from favorites where command_id = '{$id}' and user_id = $userid
		");
		return $query->result();
	}

	function delete_command($id)
	{
		$query = $this->db->query(" 
		update commands set deleted = '1' where id='{$id}' ");
	}

	function get_view_vim_command_info($id)
	{
		$query = $this->db->query("
		SELECT 
			c.*, c.id as cid, t.* from commands c 
		LEFT JOIN
			tags_link tl
		ON
            tl.command_id = c.id
		LEFT JOIN
			tags t
		ON 
			t.id = tl.command_id
		WHERE 
			c.id = '{$id}'
		");
		return $query->result();
	}


	function saveTag($tagname)
	{
		$query = $this->db->query("
		select id from tags where tagname like '{$tagname}';
		");
		$result = $query->result();

		if($result != "")
		{
			$query = $this->db->query(" insert into tags (tagname) values ('{$tagname}');");

		$id = $this->db->insert_id();

		return $id;
			
		}else{
			$id = $result->id;
			return $id;
		}
	}
}
?>
