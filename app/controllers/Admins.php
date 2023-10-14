<?php
class  Admins extends Controller {
    public function index() {
        $this->view('admin/index'); //load view inside views/admin/index.php
    }
}