<?php

    // get command
    $command = $_GET['command'];

    // command: save
    // inputs: a nickname and a message
    // outputs: a copy of the message, or 'error'
    if ($command == 'save') {
        $nickname = $_POST['nickname'];
        $message = $_POST['message'];

        //validation
        if($nickname && $message){
            $db = new SQLite(getcwd() . 'database/messages.db');
            $sql = "INSERT INTO chats (nickname, message) VALUES (:nick, :msg)";
            $statement = $db->prepare($sql);
            $statement->bindParam(':nick', $nickname);
            $statement->bindParam(':msg', $message);
            $statement->execute();

            print $nickname . ": " . $message;
        }
        else{
            print 'missingdata';
        }
        $db->close();
        unset($db);

    }
    
    // command: get_all_messages
    // inputs:  none
    // output:  all previous messages, formatted as a JSON array
    if ($command == 'get_all_messages') {

        $db = new SQLite(getcwd() . 'database/messages.db');
        $sql = "SELECT nickname, message FROM chats";
        $statement = $db->prepare($sql);
        $result = $statement->execute();

        $return_array = array();
        while($temp_array = $result->fetchArray()){
            array_push($return_array, $temp_array['nickname'] . ": " . $temp_array['message']);
        }

        $db->close();
        unset($db);

        print json_encode($return_array);

    }


    if ($command == 'user') {

        $nickname = $_POST['nickname'];

        $db = new SQLite(getcwd() . 'database/messages.db');
        $sql = "SELECT nickname FROM chats where nickname=$nickname";
        $statement = $db->prepare($sql);
        $result = $statement->execute();

        $array = $result->fetchArray()

        // the nickname already exists
        if (count($array) != 0){
            print 'duplicate';
        }

        $db->close();
        unset($db);
    }


?>
