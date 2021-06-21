<?php

class Format {


    public function textShorten($text, $limit = 400){ //limit set for 400 chars
        $text = $text. "";
        $text = substr($text, 0, $limit );
        $text = $text. "..."; ///if the text is longer it will desplay ...
        return $text;
    }


    public function validation($data){
        $data = trim($data); //trimming
        $data = stripslashes($data);  //removing backslashes
        $data = htmlspecialchars($data); // special chars
        return $data;

    }


}



?>