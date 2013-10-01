<?php

/* Class : libs_user
 * Function : have all informations on each page of the user actually logged
 * Version : 0.1
 * Date : 16/04/13
 * @Author : Miki and Quentin
 */


class libs_user extends user {

      function __construct($id) {
          parent::__construct($id);
         // $this->insertTable("user_details", "userId", $id);
      }


    
}

?>
