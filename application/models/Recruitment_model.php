<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Recruitment_model extends MY_Model
{
    var $table = 'recruitment';

    public function get_list_by_department($arr)
    {
        $len = sizeof($arr);
        if ($len <= 1)
        {
            $this->db->where(array('department' => $arr[0]));
        }
        else
        {
            $this->db->where(array('department' => $arr[0]));
            for ($i = 1; $i < $len; $i++)
            {
                $this->db->or_where(array('department' => $arr[$i]));
            }
        }

        $query = $this->db->get($this->table);
        return $query->result();
    }
}