<?php
class Admin extends CI_Controller
{
    public function dashboard()
    {
        $data['users'] = $this->user->get_all_users();

        $this->load->view('templates/header');
        $this->load->view('admin/admin', $data);
        $this->load->view('templates/footer');
    }
    function new () {
        $this->load->view('templates/header');
        $this->load->view('admin/new');
        $this->load->view('templates/footer');
    }

    public function edit_user($id)
    {
        $data['user'] = $this->user->get_user_by_id($id);

        $this->load->view('templates/header');
        $this->load->view('admin/edit', $data);
        $this->load->view('templates/footer');
    }

    public function add_user()
    {
        $result = $this->user->validate_all($this->input->post());
        if ($result == "valid") {
            $this->user->create_user($this->input->post());
            $this->session->set_flashdata('success', 'Added successfully!');
            redirect(base_url() . 'users/new');

        } else {
            $validation_errors = array(
                "first_name_error" => form_error('first_name'),
                "last_name_error" => form_error('last_name'),
                "email_error" => form_error('email'),
                "password_error" => form_error('password'),
                "confirm_password_error" => form_error('confirm_password'),
            );
            $this->session->set_flashdata($validation_errors);
            redirect(base_url() . 'users/new');
        }
    }

    public function update_user_overall()
    {
        if ($this->input->post('action') == 'change_personal_info') {
            $result = $this->user->validate_personal_info($this->input->post());
            if ($result != 'valid') {
                $validation_errors = array(
                    "first_name_error" => form_error('first_name'),
                    "last_name_error" => form_error('last_name'),
                    "email_error" => form_error('email'),
                );
                $this->session->set_flashdata($validation_errors);
                var_dump($validation_errors);
            } else {
                $this->user->update_user($this->input->post());
            }
        } else if ($this->input->post('action') == 'change_password') {
            $result = $this->user->validate_password($this->input->post());
            if ($result != 'valid') {
                $validation_errors = array(
                    "password_error" => form_error('password'),
                    "confirm_password_error" => form_error('confirm_password'),
                );
                $this->session->set_flashdata($validation_errors);
            } else {
                $this->user->update_user($this->input->post());
            }
        } else if ($this->input->post('action') == 'change_description') {
            $this->user->update_user($this->input->post());
        }
        redirect(base_url() . 'users/edit/' . $this->input->post('id'));
    }

    public function remove_user($user_id)
    {
        if ($this->session->userdata('user_level') != 'admin') {
            redirect(base_url());
        } else {
            $this->user->delete_user($user_id);
            redirect(base_url());
        }

    }
}
