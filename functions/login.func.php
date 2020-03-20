<?php
//include 'config/db.php';
function user_exists($email,$password){
    global $db;
    $password = sha1($password);
    $sql = "SELECT*FROM users WHERE email=:email AND password=:password";
    $q = $db->prepare($sql);
    $q->execute([
        'email' => $email,
        'password' => $password
    ]);
    return $q->rowCount();
}

function get_user_info($email){
    global $db;
    $q = $db->prepare("SELECT*FROM users
                       WHERE  email = :email");
        $q->execute([
            'email' => $email
        ]);
        return $q->fetch(PDO::FETCH_OBJ);
}





?>