<?php
function GenBoard($l,$c){
    //true = noir - false = blanc
    $case = true;

    $damier = [];
    for ($i=0;$i<$l; $i++){

        for ($j=0;$j<$c; $j++){

            switch($case){

                case true:
                    $damier[$i][$j] = 1;
                    $case = false;
                    break;

                case false:
                    $damier[$i][$j] = 0;
                    $case = true;
                    break;

                default:
                    break;

            }
            if($l%2 == 0 && $c%2 == 0){
                if($i%2 != 0)
                {
                    $damier[$i][$j] = !$damier[$i][$j];
                }           
            }

        }

    }
    return $damier;
}

function DisplayBoard($board){
    echo "<div class='board'>";
    for ($i=0;$i<count($board); $i++){
        echo "<div class='line'>";
        foreach($board[$i] as $k => $v ){
            if($v == 0){
                echo "<div class='white'></div>";
            }
            else
            {
                echo "<div class='black'></div>";
            }
        }
    echo "</div>";
    }
    echo "</div>";
}

function RandArray($num){
    $nbVal = $num;
    $array = [];
    for($i = 0; $i < $nbVal; $i++){
        $array[$i] = random_int(1, 999999);
    }
    return $array;
}

function DisplayArray($array){
    $rows = array();
        $cells = array();
        for ($ii = 0; $ii < count($array); $ii++) {
            $data = $array[$ii];
            $cells[] = "<td>{$data}</td>";
        }
        $rows[] = "<tr>" . implode('', $cells) . "</tr>";
    $table = "<table>" . implode('', $rows) . "</table>";
    echo $table;
}

function SortArray($nbitem, $sorttype){
    $arraybase = RandArray($nbitem);
    switch($sorttype)
    {
        case "ASC":

            sort($arraybase);
            break;

        case "DESC":
            rsort($arraybase);
            break;

        default:
            break;
    }
    return $arraybase;
}

function GenMulti($l, $c, $sort){
    $mult = array();
    for ($i=0;$i<$l; $i++){
        $array = RandArray($c);
        $arrayS = SortArray($array, $sort);
        array_push($mult, $arrayS);
        echo var_dump($mult);
    }
    
   return $mult;
}

function DisplayMultiArray($mult){
    $rows = array();
    for($i=0;$i<count($mult);$i++){
        $cells = array();
        $ds = $mult[$i];
        for ($ii = 0; $ii < count($mult[$i]); $ii++) {
            $data = $ds[$ii];
            $cells[] = "<td>{$data}</td>";
        }
        $rows[] = "<tr>" . implode('', $cells) . "</tr>";
    }
    echo var_dump($rows);
    $table = "<table>" . implode('', $rows) . "</table>";
    echo $table;
}
?>