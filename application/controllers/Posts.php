<?php
class Posts extends CI_Controller
{
    public function post_message()
    {
        $result = $this->post->validate_message($this->input->post());
        if ($result == 'valid') {
            $this->post->add_message($this->input->post());
            redirect(base_url() . 'users/show/' . $this->input->post('receiver_id'));
        } else {
            $validation_errors = array(
                "message_error" => form_error('message'),
            );
            $this->session->set_flashdata($validation_errors);
            redirect(base_url() . 'users/show/' . $this->input->post('receiver_id'));
        }
    }
    public function post_comment()
    {
        // var_dump($this->input->post());
        $result = $this->post->validate_comment($this->input->post());
        if ($result == 'valid') {
            $this->post->add_comment($this->input->post());
            redirect(base_url() . 'users/show/' . $this->input->post('receiver_id'));
        } else {
            $validation_errors = array(
                "comment_error" => form_error('message'),
            );
            $this->session->set_flashdata($validation_errors);
            redirect(base_url() . 'users/show/' . $this->input->post('receiver_id'));
        }
    }
}
