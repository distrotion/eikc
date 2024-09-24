<?php

namespace app\models;

use dektrium\user\models\RegistrationForm as BaseRegistrationForm;

class RegistrationForm extends BaseRegistrationForm
{
    /** @var int */
    public $role;

    public $roleList;

    public function init()
    {
        parent::init();
        $this->roleList = [
                            User::USER_ADMIN => 'Admin',
                        ];
    }

    public function rules()
    {
        $rulesList = parent::rules();
        array_push($rulesList, ['role', 'safe']);
        return $rulesList;
    }

    public function register()
    {
        if (!$this->validate()) {
            return false;
        }

        $this->user->setAttributes([
            'email'    => $this->email,
            'username' => $this->username,
            'password' => $this->password,
            //'role' => $this->role,
        ]);

        return $this->user->register();
    }
}