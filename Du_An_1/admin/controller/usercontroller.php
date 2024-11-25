<?php
// usercontroller.php

require_once '../model/usermodel.php';

class UserController {
    public function listUsers() {
        $userModel = new UserModel();
        $users = $userModel->getAllUsers();
        include '../view/listUser.php';
    }

    public function addUser() {
        include '../view/addUser.php';
    }

    public function insertUser() {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $userModel = new UserModel();
        $userModel->insertUser($username, $email, $password);

        header("Location: usercontroller.php?action=listUsers");
    }

    public function deleteUser() {
        $id = $_GET['id'];
        $userModel = new UserModel();
        $userModel->deleteUser($id);

        header("Location: usercontroller.php?action=listUsers");
    }

    // Add more methods for editUser and updateUser as needed
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $controller = new UserController();

    switch ($action) {
        case 'listUsers':
            $controller->listUsers();
            break;
        case 'addUser':
            $controller->addUser();
            break;
        case 'insertUser':
            $controller->insertUser();
            break;
        case 'deleteUser':
            $controller->deleteUser();
            break;
        // Add more cases for editUser and updateUser as needed
    }
}
?>
