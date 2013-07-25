<?php
namespace Backoffice\Model;

class User
{
    public $id;
    public $username;
    public $email;
    public $date;
    public $status;

    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->username = (isset($data['username'])) ? $data['username'] : null;
        $this->email  = (isset($data['email'])) ? $data['email'] : null;
        $this->date  = (isset($data['date'])) ? $data['date'] : null;
        $this->status  = (isset($data['status'])) ? $data['status'] : null;
    }
}