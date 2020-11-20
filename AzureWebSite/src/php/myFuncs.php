
<?php

//   Milestone-1 
//   ver. 1 
//   Joshua W., Noah R., Brydon J.

//   loginHandler.php: 
//      this php script defines a few functions to be used by out application

//      dbConnect(): returns a connection to our SQL database
//      saveUserID($id): save the user id to the session to be accessed later
//      getUserID(): returns the user id that was saved to the session

    function dbConnect(){
        $servername = "cst126.database.windows.net";
        $server_username = "brykeith";
        $server_password = "Password123";
        $database = "myWebBlog";
        $connectionInfo = array( "Database" => $database, "UID" => $server_username, "PWD" => $server_password);

        // create connection
        $conn = sqlsrv_connect($servername, $connectionInfo);

        // check connection
        if( $conn ) { } 
        else {
            echo "Connection could not be established.<br />";
            die( print_r( sqlsrv_errors(), true));
        }

        return $conn;
    }

    // save user id for later access
    function saveUserID($id)
    {
      session_start();
      $_SESSION["USER_ID"] = $id;
    }

    // returns the current session user id
    function getUserID(){
      session_start();
      return $_SESSION["USER_ID"];
    }

?>