<?php

namespace App\Http\web\vk\methods;

use App\Http\web\vk\enums\NameCase;
use App\Http\web\vk\Vk;

class Users extends Vk
{
    /**
     * Returns detailed information on users.
     *
     * @param array       $userIds
     * @param array|null  $fields - User fields to return
     * @param null|string $nameCase - nom, gen, dat, etc
     *
     * @see https://vk.com/dev/fields - User object
     * @see https://vk.com/dev/users.get - Method
     *
     * @return mixed
     */
    public function get(array $userIds, ?array $fields = null, ?string $nameCase = NameCase::NOMINATIVE)
    {
        $response = self::request('users.get', [
            'user_ids'  => implode(',', $userIds),
            'fields'    => implode(',', $fields),
            'name_case' => $nameCase
        ]);

        return json_decode($response);
    }
}
