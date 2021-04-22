<?php
class User_model extends CI_Model
{

    public function get_all_users()
    {
        return $this->db->query("SELECT * FROM users")->result_array();
    }

    public function get_user_by_email($user_email)
    {
        return $this->db->query("SELECT * FROM users WHERE email = ?", array($user_email))->row_array();
    }

    public function get_user_by_id($user_id)
    {
        return $this->db->query("SELECT * FROM users WHERE id = ?", array($user_id))->row_array();
    }

    public function create_user($user)
    {
        date_default_timezone_set('Asia/Manila');
        $record = $this->get_all_users();
        if (count($record) == 0) {
            $user_level = 'admin';
        } else {
            $user_level = 'normal';
        }
        $query = "INSERT INTO users (first_name, last_name, email, password, user_level, created_at) VALUES (?,?,?,?,?,?)";
        $values = array($user['first_name'], $user['last_name'], $user['email'], md5($user['password']), $user_level, date("Y-m-d, H:i:s"));
        return $this->db->query($query, $values);
    }

    public function update_user($user)
    {
        date_default_timezone_set('Asia/Manila');
        if ($user['action'] == 'change_personal_info') {
            $query = "UPDATE users SET first_name = ?, last_name = ?, email = ?, updated_at = ? WHERE id = ?";
            $values = array($user['first_name'], $user['last_name'], $user['email'], date("Y-m-d, H:i:s"), $user['id']);
        } else if ($user['action'] == 'change_password') {
            $query = "UPDATE users SET password = ?, updated_at = ? WHERE id = ?";
            $values = array(md5($user['password']), date("Y-m-d, H:i:s"), $user['id']);
        } else if ($user['action'] == 'change_description') {
            $query = "UPDATE users SET description = ?, updated_at = ? WHERE id = ?";
            $values = array($user['description'], date("Y-m-d, H:i:s"), $user['id']);
        }
        return $this->db->query($query, $values);
    }

    public function delete_user($user_id)
    {
        return $this->db->query("DELETE FROM users WHERE id = ?", $user_id);
    }

    public function validate_all($post)
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
        if ($this->form_validation->run()) {
            return "valid";
        } else {
            return array(validation_errors());
        }
    }

    public function validate_personal_info()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run()) {
            return "valid";
        } else {
            return array(validation_errors());
        }
    }

    public function validate_password()
    {
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
        if ($this->form_validation->run()) {
            return "valid";
        } else {
            return array(validation_errors());
        }
    }
}
