<?php
class Getweather {

    public function getData($source) {
        $handle = fopen($source, "r");
        if ($handle!==false){
            while($row = fgetcsv($handle, 1000, ";")){
            $data[]=$row;
            }
            return $data;
        }else{
            echo "Une erreur est survenue dans la recherche de la source";
        }
        fclose($handle);
    }

    public function insertData ($datas) {
        $mysqli = new mysqli("localhost", "root", "", "projet_weather");
        $mysqli->set_charset("utf8");
        if($mysqli->connect_errno){
            printf("Echec de la connexion:%s\n", $mysqli->connect_error);
            exit();
        }
        //on insert si la table est vide sinon nous aurons des doublons
        $req= $mysqli->query("SELECT * FROM weather");
        $num_rows=mysqli_num_rows($req);
        if($num_rows<1){
            foreach ($datas as $data){
                $result=$mysqli->query('INSERT INTO weather (weather_date, weather_city, weather_time, weather_abstract, weather_id_abstract, weather_min_temperature, weather_max_temperature, weather_comment)  VALUES ("'.$data[0].'", "'.$data[1].'", "'.$data[2].'", "'.$data[3].'", "'.$data[4].'", "'.$data[5].'", "'.$data[6].'", "'.$data[7].'")');
            }
            if(!$result){
                echo 'Une erreur est survenue lors de l\'insertion des données dans la base. Message d\'erreur : '.$mysqli->error;
                return false;
            }else{
                return true;
            }
        }
        $mysqli->close();
    }

    public function displayData($day) {
        $mysqli = new mysqli("localhost", "root", "", "projet_weather");
        $mysqli->set_charset("utf8");
        
        if($mysqli->connect_errno){
            printf("Echec de la connexion:%s\n", $mysqli->connect_error);
            exit();
        }
        $sql='SELECT weather_date, weather_city, weather_time, weather_abstract, weather_id_abstract, weather_min_temperature, weather_max_temperature, weather_comment FROM weather WHERE weather_date="'.$day.'"';
        $result=$mysqli->query($sql);
        if(!$result){
            echo 'Une erreur est survenue lors de la lecture des données dans la base. Message d\'erreur : '.$mysqli->error;
            return false;
        }else{
            while ($row = $result->fetch_array()) {
                $table[]=$row;
            }
            
            return $table;
        }    
    }
}
?>