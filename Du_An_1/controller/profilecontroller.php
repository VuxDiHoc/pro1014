<?php

require_once 'model/user.php';

class profileController
{
    public function profile()
    {
        if (isset($_SESSION['user'])) {
            $email = $_SESSION['user']['email']; 
            $userProfile = getUserProfile($email); 
            
            if ($userProfile) {
                require_once 'view/profile.php'; 
            } else {
                echo "Không tìm thấy thông tin người dùng!";
            }
        } else {
            
            header('Location: ?act=login');
            exit;
        }
    }
    public function updateProfile()
    {
        if (!isset($_SESSION['user'])) {
            
            header('Location: ?act=login');
            exit;
        }

        
        $fullname = $_POST['fullname'] ?? null;
        $phone = $_POST['phone'] ?? null;
        $address = $_POST['address'] ?? null;

        
        if (empty($fullname) || empty($phone) || empty($address)) {
            echo "Vui lòng nhập đầy đủ thông tin!";
            return;
        }

        
        $userId = $_SESSION['user']['id_user'];

        
        $updateSuccess = updateUserProfile($userId, $fullname, $phone, $address);

        if ($updateSuccess) {
            
            $_SESSION['user']['full_name'] = $fullname;
            
            
            header('Location: ?act=profile');
            exit;
        } else {
            echo "Cập nhật hồ sơ không thành công. Vui lòng thử lại!";
        }
    }

    
}


?>

