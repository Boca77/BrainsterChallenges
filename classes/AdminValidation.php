<?php

namespace AdminValidation;

require_once(__DIR__ . '/AdminData.php');

use AdminData\AdminData as AdminData;

class AdminValidation
{
    public array $adminData;

    public function __construct()
    {
        $data = new AdminData();
        $this->adminData = $data->getData();
        foreach ($this->adminData as $key => $admin) {
            $this->adminData[$key]['password'] = password_hash($admin['password'], PASSWORD_DEFAULT);
        }
    }

    public function validate($username, $email, $password)
    {
        foreach ($this->adminData as $admin) {
            if (($username == $admin['username']) && ($email == $admin['email'])) {
                if (password_verify($password, $admin['password'])) {
                    return true;
                }
            }
        }
        return false;
    }
}
