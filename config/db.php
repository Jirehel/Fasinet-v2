<?php
//Connexion à la base de donnée
    session_start(); 
    $dbhost = 'localhost';
    $dbname = 'fasinet';
    $dbuser = 'root';
    $dbpswd = '';
    try{
        $db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswd,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
              PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    }catch(PDOexception $e){
        die("Une erreur est survenue lors de la connexion à la base de données");
    }

//main functions 
    function isLogged(){
        if(isset($_SESSION['email'])){
            $logged = 1;
        }else{
            $logged = 0;
        }
        return $logged;
    }

    //Un raccourci pour htmlspecialchars(trim($string))
    function e($string){
        if ($string) {
            return  htmlspecialchars(trim($string));
        }
    }

    //Verifie si un champs est vide 
    function not_empty($fields = []){
        if(count($fields) != 0){
            foreach($fields as $field){
                if(empty($_POST[$field]) || e($_POST[$field]) == ""){
                    return false;
                }
            }
            return true;
        }
    }
    //Recupere toutes les information de l'user  par son id dans la bdd
    if(!function_exists('find_user_by_id')){
    function find_user_by_id($id){
       global $db;
       $q = $db->prepare('SELECT * FROM users WHERE id = ?');
       $q->execute([$id]);
       $data = $q->fetch(PDO::FETCH_OBJ);
       $q->closeCursor();
        return $data;
    }
   }
   function admin(){
    if(isset($_SESSION['admin'])){
        global $db;
        $a = [
            'email'     =>  $_SESSION['admin'],
            'role'      =>  'admin'
        ];

        $sql = "SELECT * FROM admins WHERE email=:email AND role=:role";
        $req = $db->prepare($sql);
        $req->execute($a); 
        $exist = $req->rowCount($sql);

        return $exist;
    }else{
        return 0;
    }
}
//  
function hasnt_password(){
    global $db;

    $sql = "SELECT * FROM admins WHERE email = '{$_SESSION['admin']}' AND password = ''";
    $req = $db->prepare($sql);
    $req->execute();
    $exist = $req->rowCount($sql);
    return $exist;
}
// Recupère les users récemment contactés
function get_contacted_users(){
    global $db;
     $sql ="SELECT
               sender,
               receiver
            FROM messages
            WHERE (sender=:a OR receiver=:a )
            ORDER BY date  DESC ";

    $req = $db->prepare($sql);
    $req->execute(['a' => $_SESSION['email']]);
        $result = [];
    while ($element = $req->fetchobject()) {
        $result[] = $element;
    }
    //var_dump($result);
      $contacted = [];
      foreach ($result as $value) {
         if ($value->sender != $_SESSION['email'] ) {
           $contacted[] = $value->sender;
         }
         if ($value->receiver != $_SESSION['email']) {
           $contacted[] = $value->receiver;
         }
      }
      $result = [];
      foreach (array_unique($contacted) as $value) {
      $sql ="SELECT
               id,
               nom,
               prenom,
               email,
               profil,
               statut
            FROM users
            WHERE email = :a
            ";
          $req = $db->prepare($sql);
          $req->execute(['a' => $value]);
              $result[] = $req->fetchobject();   
      }
    return $result;
} 
function get_notifications($a = ''){
    global $db;
    $sql = "SELECT  
            notifications.type,
            notifications.element_type,
            notifications.element_id,
            users.id,
            users.nom,
            users.prenom,
            users.email
          FROM notifications
          JOIN users
          ON notifications.sender = users.email
          WHERE (notifications.receiver = ? $a) 
          ORDER BY date DESC ";
    $q = $db->prepare($sql);
    $q->execute([$_SESSION['email']]);
    $result = [];
    while ($row = $q->fetchObject()) {
        $result[] = $row;
    }

     $notif =[];
        $i = 0;
        foreach ($result as $value ) {
          if (count($notif)==0) {
            $notif[$i]['type'] = $value->type;
            $notif[$i]['email'] = $value->email;
            $notif[$i]['notif_count'] = 1;
            $notif[$i]['element_type'] = $value->element_type;
            $notif[$i]['element_id'] = $value->element_id;
            $notif[$i]['prenom'] = $value->prenom;

            $notif[$i]['id'] = $value->id;
            $notif[$i]['nom'] = $value->nom;
            $i++;
          } else {
              $a = count($notif);
              $bool = 1;
              for ($y=0; $y < $a; $y++) { 
                if ($notif[$y]['type'] == $value->type AND 
                    $notif[$y]['email'] == $value->email) {        
                    $notif[$y]['notif_count']++;
                    $bool = 0;
                }   
               }
              if ($bool == 1) {
                  $notif[$i]['type'] = $value->type;
                  $notif[$i]['email'] = $value->email;
                  $notif[$i]['notif_count'] = 1;
                  $notif[$i]['element_type'] = $value->element_type;
                  $notif[$i]['element_id'] = $value->element_id;
                  $notif[$i]['prenom'] = $value->prenom;
                  $notif[$i]['id'] = $value->id;
                  $notif[$i]['nom'] = $value->nom;
                  $i++;
              }
          }
          
        }

    return $notif;
}
// recuperer toute notification de l'user connecté
function get_total_notifications(){
    global $db;
       $sql = "SELECT * FROM notifications
          WHERE (notifications.receiver = ? AND seen = 0) ";
    $q = $db->prepare($sql);
    $q->execute([$_SESSION['email']]);
    return   $total = $q->rowCount();
}
// recuperer le nombre de messages de l'user connecté
function get_total_messages(){
    global $db;
       $sql = "SELECT * FROM notifications
          WHERE (receiver = ? AND type = 'messages' AND seen = 0) ";
    $q = $db->prepare($sql);
    $q->execute([$_SESSION['email']]);
    return   $total = $q->rowCount();
}

function editor($string)
{
    $a= '<div class="row"><div id="structure" class="section scrollspy col s12">
          <pre><code class="language-javascript">';
    $b = '</code></pre></div></div>';
    $temp = str_replace('[code]', $a, $string);
    $fin = str_replace('[|code]', $b, $temp);
  return $fin;
}