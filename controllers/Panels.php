<?php
class Panels extends Controller
{
    private $panelModel;

    public function __construct()
    {
        $this->panelModel = $this->model('Panel');
    }


    public function index()
    {
        $data["users"] = $this->panelModel->getAllUsers();
        $this->view('panel', $data);
    }

    public function activeUser($id)
    {
        $this->panelModel->activeUser($id);
       $this->index();
    }
    public function deActiveUser($id)
    {
        $this->panelModel->deActiveUser($id);
        $this->index();
    }
    public function deleteUser($id)
    {
        $this->panelModel->deleteUser($id);
        $this->index();
    }
}
