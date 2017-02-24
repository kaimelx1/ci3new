<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aleksandr_vashchenko_crud_model extends CI_Model
{
    /**
     * Makes query to DB for table info
     * @return array
     */
    public function table()
    {
        // Per page count
        $per_page = $this->db->count_all('users');
        if (isset($_GET['per_page']) AND $_GET['per_page'] != 'all') {
            $per_page = intval($_GET['per_page']);
        }

        // Limit clause
        $limit = 'LIMIT ' . $per_page;
        if (isset($_GET['page'])) {
            $page = intval($_GET['page']);
            $limit = ' LIMIT ' . (($page - 1) * $per_page) . ',' . $per_page . '';
        }

        // Where clause for search
        $where = '';
        if (isset($_GET['search']) AND $_GET['search'] != '') {
            $where .= " AND (
                        users.email LIKE '%" . $this->db->escape_like_str($_GET['search']) . "%'
                        OR groups.name LIKE '%" . $this->db->escape_like_str($_GET['search']) . "%'
                        OR users.id LIKE '%" . $this->db->escape_like_str($_GET['search']) . "%'
                        OR users.username LIKE '%" . $this->db->escape_like_str($_GET['search']) . "%'
                            )";
        }

        // SQL Query
        $sql = "SELECT users.id, users.username, users.email, GROUP_CONCAT(groups.name SEPARATOR  '<br>') as groups
                FROM users
                LEFT JOIN users_groups ON users_groups.user_id = users.id
                LEFT JOIN groups ON users_groups.group_id = groups.id
                WHERE 1
                {$where}
                GROUP BY users.id
                {$limit}
               ";

        return $this->db->query($sql)->result_array();
    }

    /**
     * Makes query to DB for groups info
     * @return array
     */
    public function groups_info()
    {
        return $this->db->get('groups')->result_array();
    }

    /**
     * Makes query to DB for user's info
     * @param int $id
     */
    public function user_info($id)
    {
        $sql = "SELECT users.id, users.username, users.email, GROUP_CONCAT(groups.name SEPARATOR  ',') as groups
                FROM users
                LEFT JOIN users_groups ON users_groups.user_id = users.id
                LEFT JOIN groups ON users_groups.group_id = groups.id
                WHERE users.id = " . intval($id) . "
                GROUP BY users.id
                LIMIT 1
               ";

        if ($result = $this->db->query($sql)->result_array()) {
            return $result[0];
        } else {
            redirect(site_url('/aleksandr_vashchenko_crud/'));
            die();
        }
    }

    /**
     * Adds new user
     * @return bool
     */
    public function add_user()
    {
        return $this->ion_auth->register($this->input->post('username', true), $this->input->post('password', true),
            $this->input->post('email', true), array(), $this->input->post('groups', true));
    }

    /**
     * Edits user's info
     * @return bool
     */
    public function edit_user($id)
    {
        // Gathering data info
        if ($this->input->post('password', true) != '') $data['password'] = $this->input->post('password', true);
        $data['username'] = $this->input->post('username', true);
        $data['email'] = $this->input->post('email', true);

        //updating
        $step1 = $this->ion_auth->update(intval($id), $data);
        // Deleting old group info
        $step2 = $this->ion_auth->remove_from_group(NULL, intval($id));
        // Inserting new group info
        $step3 = $this->ion_auth->add_to_group($this->input->post('groups', true), intval($id));

        //return
        if($step1 && $step2 && $step3) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Deletes user
     */
    public function delete_user()
    {
        // Deleting users
        foreach ($this->input->get('del', true) as $del_id) {
            $this->ion_auth->delete_user($del_id);
        }
    }
}