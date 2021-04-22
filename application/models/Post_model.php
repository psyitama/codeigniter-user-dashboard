<?php
class Post_model extends CI_Model
{

    public function add_message($post)
    {
        date_default_timezone_set('Asia/Manila');
        $query = "INSERT INTO messages (user_id, receiver_id, message, created_at) VALUES (?,?,?,?)";
        $values = array($post['user_id'], $post['receiver_id'], $post['message'], date("Y-m-d, H:i:s"));
        return $this->db->query($query, $values);
    }
    public function get_messages($user_id)
    {
        return $this->db->query("SELECT users.first_name, users.last_name,
                                messages.user_id as from_id, messages.id,
                                messages.receiver_id, messages.message,
                                messages.created_at FROM messages
                                LEFT JOIN users ON users.id = messages.user_id
                                WHERE messages.receiver_id=? ORDER BY messages.created_at DESC", $user_id)->result_array();
    }
    public function add_comment($post)
    {
        date_default_timezone_set('Asia/Manila');
        $query = "INSERT INTO comments (user_id, message_id, comment, created_at) VALUES (?,?,?,?)";
        $values = array($post['user_id'], $post['message_id'], $post['comment'], date("Y-m-d, H:i:s"));
        return $this->db->query($query, $values);
    }
    public function get_comments()
    {
        return $this->db->query("SELECT users.first_name, users.last_name,
                                comments.comment, comments.message_id,
                                comments.user_id, comments.created_at
                                FROM comments LEFT JOIN users
                                ON comments.user_id = users.id")->result_array();
    }

    public function validate_message()
    {
        $this->form_validation->set_rules('message', 'Message', 'required');
        if ($this->form_validation->run()) {
            return "valid";
        } else {
            return array(validation_errors());
        }
    }

    public function validate_comment()
    {
        $this->form_validation->set_rules('comment', 'Comment', 'required');
        if ($this->form_validation->run()) {
            return "valid";
        } else {
            return array(validation_errors());
        }
    }

}
