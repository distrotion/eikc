<?php

namespace app\models;

use dektrium\user\models\User as BaseUser;

class User extends BaseUser
{

    const USER_ADMIN = 10;
    const USER_SJJ = 1;
    const USER_GREENBORNE = 2;

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        // add field to scenarios
        $scenarios['create'][]   = 'role';
        $scenarios['update'][]   = 'role';
        $scenarios['register'][] = 'role';
        return $scenarios;
    }

    public function rules()
    {
        $rules = parent::rules();
        // add some rules
        //$rules['fieldRequired'] = ['field', 'required'];
        //$rules['fieldLength']   = ['field', 'string', 'max' => 10];
        return $rules;
    }
}