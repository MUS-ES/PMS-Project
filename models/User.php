<?php
class User
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function register($data)
    {
        $this->db->query('INSERT INTO users (email, password,first_name,last_name,ph_name,licence,active) VALUES(:email, :password, :first_name,:last_name,:ph_name,:licence,:active)');

        //Bind values
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':ph_name', $data['ph_name']);
        $this->db->bind(':licence', $data['licence']);
        $this->db->bind(':active', $data['active']);

        //Execute function
        if ($this->db->execute())
        {
            return $this->db->single();
        }
        else
        {
            return false;
        }
    }
    public function login($email, $password)
    {

        

            $this->db->query('SELECT id,email,password,active FROM users WHERE email= :email');
            //Bind value
            $this->db->bind(':email', $email);
            if ($this->db->rowCount() == 0)
            {
                return false;
            }

            $row = $this->db->single();

            $hashedPassword = $row->password;
            if (password_verify($password, $hashedPassword))
            {
                return $row;
            }
        return false;
    }
    public function isEmailExist($email)
    {
        $this->db->query('SELECT email FROM users where email =:email');
        $this->db->bind(':email', $email);
        if ($this->db->rowCount() > 0)
        {
            return true;
        }
        return false;
    }
}
