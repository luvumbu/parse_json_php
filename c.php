<?php
class Information {
 
  public $servername ; 
  public $username ; 
  public $password ; 
  public $dbname ; 
  public $sql ; 

  public $row =array();

  function __construct(
  $servername,
  $username,
  $password,
  $dbname
  ) {
    $this->servername = $servername;
    $this->username = $username;
    $this->password = $password;
    $this->dbname = $dbname;
  }
  function get_servername() {
    return $this->servername;
  }
  function get_username() {
    return $this->username;
  }
  function get_password() {
    return $this->password;
  }
  function get_dbname() {
    return $this->dbname;
  }

  function get_sql() {
    return $this->sql;
  }
  function get_row($number) {
    return $this->row[$number];
  }


  function set_servername($servername) {
    $this->servername = $servername ; 
  }
  function set_username($username) {
    $this->username = $username ; 
  }
  function set_password($password) {
    $this->password = $password ; 
  }
  function set_dbname($dbname) {
    $this->dbname = $dbname ; 
  }
  function set_sql($sql) {
    $this->sql=  $sql;
  }
  function set_row($row){
    array_push($this->row,$row);
  }

  function execution(){
 
    echo '[' ; 
    // Create connection
    $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = $this->sql;
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {

        echo '{' ; 

        foreach ($this->row as $value) {
      echo   '"'.$value.'":"'.$row[$value].'",'; 

          }
          echo '"":""';
        echo '},' ; 
          
      }
    }     
    mysqli_close($conn);

    echo  '{ } ';

    echo ']';
    echo ']';

  }



}

$apple = new Information(
"localhost",
"root",
"root",
"info_all_array");
// Etape n°1 Donner le nom de la BD et la table //


$apple->set_sql('SELECT * FROM `info_all_array` WHERE 1') ;
// Etape n°2 recherche spetifique dans la BDD 

 /*
"get_club_departement_array_2",
"get_club_region_array_2",

"get_cat_array_2",
"get_users_naissance_array_2",
"get_result_date_perf_array_2",
"get_result_villes_nom_array_2",
"epreuve_sex_array_2",
"get_users_nom_complet_array",
"info_all_array_click",

"info_all_array_ip",
"info_all_array_src_name",
"window_location_href"

$apple->set_row("get_rp_array_2"); 
$apple->set_row("get_vent_array_2"); 
$apple->set_row("get_result_users_perf_array_2"); 
*/
$apple->set_row("get_result_users_nom_1_array_2"); 

$apple->set_row("get_result_users_nom_4_array_2"); 

// Etape n°3 Element a recherche lorsquil parcour la bdd
/*
$apple->set_row("get_result_users_nom_3_array_2"); 
$apple->set_row("get_result_users_nom_4_array_2"); 
$apple->set_row("get_users_nationality_array_2"); 
$apple->set_row("get_club_nom_complet_array_2"); 
$apple->set_row("get_club_departement_array_2"); 
 
*/



$apple->execution(); 

// Et pour finir execution du programme
 
?>



 