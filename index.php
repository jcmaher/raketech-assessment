<?php

echo '<link rel="stylesheet" type="text/css" href="http://'. $_SERVER['HTTP_HOST'] . '/wordpressplayground/wp-content/plugins/raketech-assessment/core/includes/assets/css/backend-styles.css" />';

//Call to path of the json file/API URL
$path = __DIR__ . "/core/includes/assets/json/hub-toplist.json";
$json_file = file_get_contents($path);

//Decode json data 
$json_data = json_decode($json_file, true);

//Set specific data needed from json
$dataToplists = $json_data["toplists"]["575"];

//Setting empty array for new sort order
$sortPosition = array();

foreach ($dataToplists as $key => $val) {
    
    $sortPosition[$key] = $val['position'];
      
}

//SORTING BY POSITION
array_multisort($sortPosition, SORT_ASC, $dataToplists);

// TABLE COMPONENT
echo '<div class="outer-component">';
echo '<table class="table-gold-banner"><caption class="access-text">Comparsion of the Top list of online gambling brands</caption>';

//HEAD OF TABLE
echo '<thead>
        <tr>
        <th scope="col">Casino</th>
        <th scope="col">Bonus</th>
        <th scope="col">Features</th>
        <th scope="col">Play</th>
        </tr>
     </thead><tbody>';

//Loop through data within 575
foreach($dataToplists as $dataToplist) {
        //ROW START
        echo '<tr>';

        // LOGO
        echo '<td><img src="'. $dataToplist["logo"] .'" class="img-brand" alt="" />';
        echo '<br><a href="'. $dataToplist["brand_id"] .'">Review now</a></td>';

        //RATING AND BONUS
        echo '<td>';
        if ($dataToplist["info"]["rating"] === 1) {
            echo '<span class="rating-stars">&#9733;&#9734;&#9734;&#9734;&#9734;</span>';
        } else if ($dataToplist["info"]["rating"] === 2) {
            echo '<span class="rating-stars">&#9733;&#9733;&#9734;&#9734;&#9734;</span>';
        } else if ($dataToplist["info"]["rating"] === 3) {
            echo '<span class="rating-stars">&#9733;&#9733;&#9733;&#9734;&#9734;</span>';
        } else if ($dataToplist["info"]["rating"] === 4) {
            echo '<span class="rating-stars">&#9733;&#9733;&#9733;&#9733;&#9734;</span>';
        } else if ($dataToplist["info"]["rating"] === 5) {
            echo '<span class="rating-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</span>';
        }
        echo '<br> <p>'. $dataToplist["info"]["bonus"] .'</p></td>';

        //LIST OF FEATURES
        echo '<td><ul>';
        foreach ($dataToplist["info"]["features"] as $key => $value) {
            echo '<li>'. $value .'</li>';
        }
        echo '</ul></td>';

        //PLAY URL AND TERMS
        echo '<td><a href="'. $dataToplist["play_url"] .'" class="button">Play now<span class="access-text">Name of brand</span></a><br>'. $dataToplist["terms_and_conditions"] .'</td>';

        //ROW END
        echo '</tr>';
}
//BODY OF TABLE END
echo '</tbody></table>';
echo '</div>';


