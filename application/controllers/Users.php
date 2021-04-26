<?php
class Users extends CI_Controller
{
    public function dashboard()
    {
        $data['users'] = $this->user->get_all_users();

        $this->load->view('templates/header');
        $this->load->view('user/dashboard', $data);
        $this->load->view('templates/footer');
    }

    //show user by their id
    public function show($id)
    {
        $data = array(
            'user' => $this->user->get_user_by_id($id),
            'messages' => $this->post->get_messages($id),
            'comments' => $this->post->get_comments(),
        );

        $this->load->view('templates/header');
        $this->load->view('user/show', $data);
        $this->load->view('templates/footer');
    }

    //user registration process
    public function create()
    {
        $result = $this->user->validate_all($this->input->post());
        if ($result == "valid") {
            $this->user->create_user($this->input->post());
            $user = $this->check_user_level($this->input->post('email'));
            $user_data = array(
                'is_logged_in' => true,
                'user_id' => $user['id'],
                'email' => $user['email'],
                'user_level' => $user['user_level'],
            );
            $this->session->set_userdata($user_data);
            $this->session->set_flashdata('success', 'Welcome! Registration was successful!');
            if ($user == 'admin') {
                redirect('admin/dashboard');
            } else {
                redirect('users/index');
            }

        } else {
            $validation_errors = array(
                "first_name" => form_error('first_name'),
                "last_name" => form_error('last_name'),
                "email" => form_error('email'),
                "password" => form_error('password'),
                "confirm_password" => form_error('confirm_password'),
            );
            $this->session->set_flashdata($validation_errors);
            redirect('register');
        }
    }

    //update profile view
    public function edit()
    {
        $data['user'] = $this->user->get_user_by_email($this->session->userdata('email'));

        $this->load->view('templates/header');
        $this->load->view('user/edit', $data);
        $this->load->view('templates/footer');
    }

    //user signin process
    public function login()
    {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $user = $this->user->get_user_by_email($email);
        if ($user && $user['password'] == $password) {
            $user_data = array(
                'is_logged_in' => true,
                'user_id' => $user['id'],
                'email' => $user['email'],
                'user_level' => $user['user_level'],
            );
            $this->session->set_userdata($user_data);
            if ($user['user_level'] == 'admin') {
                redirect('admin/dashboard');
            } else {
                redirect('dashboard');
            }
        } else {
            $this->session->set_flashdata("email", $email);
            $this->session->set_flashdata("login_error", "Invalid email or password!");
            redirect('signin');
        }
    }

    //logout user and destroy their sessions
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    //check user level for redirect purposes
    public function check_user_level($email)
    {
        $user = $this->user->get_user_by_email($email);
        if ($user['user_level'] == 'admin') {
            return 'admin';
        } else {
            return 'normal';
        }
    }

    //update profile process
    public function update_user_info()
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
        redirect(base_url() . 'users/edit');
    }
}
