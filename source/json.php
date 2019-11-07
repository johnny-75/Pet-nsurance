 <?php
 
  /*  $str = file_get_contents('states_cities.json');
    $json = json_decode($str, true);

    //print the format
    //echo '<pre>' . print_r($json, true) . '</pre>';


    //access state
    foreach ($json['states'][0] as $field => $value) {
        echo "<p>".$field."</p>";
    }

    //access cities
    foreach ($json['states'][0]['Andaman & Nicobar'] as $field => $value) {
        echo "<p>".$value."</p>";
    }*/

   $str = file_get_contents('cats.json');
    $json = json_decode($str, true);


        echo "<select><option></option>";
    foreach ($json['cats'] as $field => $value) {
        if(strcmp(substr($value,0,7),'disable')==0)
                //echo "<p>".substr($value,8,1)."</p>";
               echo'<option disabled value="'.substr($value,8,1).'">'.substr($value,8,1).'</option>';
        else
                echo'<option value="'.$value.'">'.$value.'</option>';
    }
        echo'</select>';
        
 ?>