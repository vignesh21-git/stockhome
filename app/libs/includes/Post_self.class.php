<?php

class Post{
    public static function putPost($image,$username){
        $conn = Database::getConnection();
        $sql = "INSERT INTO files(`username`,`file_name`,`uploaded_on`)VALUES('$username','$image',now())"; 
        try{
            if($conn->query($sql) == true){
               $post_id = $conn->insert_id;
                return $post_id;
            }else{
                return null;
            }
        }catch(Expression $e){
            throw new Exception("Something went wrong");
        }

    }
    
    public static function getAllpost(){
        $conn = Database::getConnection();
        $sql= "SELECT * FROM `files` ORDER BY `uploaded_on` DESC ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $posts = [];
            while ($row = $result->fetch_assoc()) {
                $posts[] = $row;
            }
            return $posts;
        } else {
            return [];
        }
    }

    public static function delPost(){

    }
    
    public static function time_ago($datetime){
        $time_difference = time() - strtotime($datetime);

        if($time_difference < 1){return 'less than 1 second ago';}
        $condition = array(12 * 30 *24 * 60 * 60 => 'year',
                        30 * 24 * 60 * 60       =>  'month',
                        24 * 60 * 60            =>  'day',
                        60 * 60                 =>  'hour',
                        60                      =>  'minute',
                        1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
        }
    }
}


    public function __construct(){
        $this->conn = Database::getConnection();
        $this->user = $username;
        $this->data = null;
        $sql = "SELECT * FROM `files` WHERE `username` = '$username' LIMIT 1";
        $result = $this->conn->query($sql);
        if ($result->num_rows) {
            $row = $result->fetch_assoc();
            $this->data = $row;
        } else {
            throw new Exception("Username not found");
        }


    }
}