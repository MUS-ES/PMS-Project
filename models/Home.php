





 <?php
class Home
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllUsers()
    {
        $this->db->query("SELECT id,email,ph_name,licence,active FROM users ORDER BY active");
        return $this->db->resultSet();
    }
    public function activeUser($id)
    {
        $this->db->query("UPDATE users SET active=1 WHERE id=:id");
        $this->db->bind("id", $id);
        return $this->db->execute();
    }
    public function deActiveUser($id)
    {
        $this->db->query("UPDATE users SET active=0 WHERE id=:id");
        $this->db->bind("id", $id);
        return $this->db->execute();
    }
    public function deleteUser($id)
    {
        $this->db->query("DELETE FROM users WHERE id=:id");
        $this->db->bind("id", $id);
        return $this->db->execute();
    }
}
