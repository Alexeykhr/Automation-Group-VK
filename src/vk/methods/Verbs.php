<?php

namespace gvk\vk\methods;

use gvk\DB;
use gvk\vk\VK;

class Verbs
{
    const T_VERBS = 'verbs';

    /**
     * Get random values from the DB and create a new post.
     *
     * @param int $count
     * @param int $photoID
     *
     * @return object
     */
    public static function createPost($count, $photoID = null)
    {
        $data = DB::getDistinctData(self::T_VERBS, $count);
        $message = "";

        foreach ($data as $key => $item) {
            $i = $key + 1;
            $message .= "$i. {$item->first_form} - {$item->second_form} - {$item->third_form}\n";

            if ($i % 5 == 0)
                $message .= "\n";
        }

        $message .= "#verbs@eng_day";

        if ( ! is_null($photoID) )
            $photoID = 'photo-' . G_ID . '_' . $photoID;

        return VK::createPost($message, $photoID);
    }

    /**
     * Get a random verb for a new post.
     *
     * @return string
     */
    public static function getRandomVerb()
    {
        $data = DB::getRandomData(self::T_VERBS);

        return "&#128203; {$data->first_form} - {$data->second_form} - {$data->third_form}";
    }
}
