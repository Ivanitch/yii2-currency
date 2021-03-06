<?php

namespace api\core\entities\User;

use core\entities\User\User as BaseUser;

class User extends BaseUser
{
    public function getTokens(): \yii\db\ActiveQuery
    {
        return $this->hasMany(Token::class, ['user_id' => 'id']);
    }

    public function fields(): array
    {
        return [
            'username' => 'username'
        ];
    }
}