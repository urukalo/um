<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of listUsers.
 *
 * @author Miki
 */
class models_api_usersInfo extends Model
{
    public function listUsers()
    {
        $return = [];
        foreach (mysql_fetch_array(mysql_query('select '.$this->reg->userIdFild.' from '.$this->reg->userTable)) as $row) {
            $return[] = new libs_user($row);
        }
        print_r($return);

        return $return;
    }
}
