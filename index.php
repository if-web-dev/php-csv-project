
<?php
require ('class/getWeather.php');
require ('process/weather_process.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
    </head>
   
    <body>
        <h1>Nous sommes le 05/12/2013</h1>
        <h2>Temps prévisionnel du lendemain</h2>
        <table>
            <tr>
                <th>
                    DATE
                </th>
                <th>
                    VILLE
                </th>
                <th>
                    PERIODE
                </th>
                <th>
                    TEMPS
                </th>
                <th>
                    ID
                </th>
                <th>
                    TEMPERATURE MINIMALE
                </th>
                <th>
                    TEMPERATURE MAXIMALE
                </th>
                <th>
                    COMMENTAIRE
                </th>
            </tr>  
            <?php for($i=0; $i<=(count($displayData))-1; $i++):?>
                <tr>
                <?php for($j=0; $j<=7; $j++):?>
                    <td>
                        <?php echo $displayData[$i][$j];?>
                    </td>
                <?php endfor;?>
                </tr>
            <?php endfor;?>       
        </table>
        <h2>Temps prévisionnel du surlendemain</h2>
        <table>
            <tr>
                <th>
                    DATE
                </th>
                <th>
                    VILLE
                </th>
                <th>
                    PERIODE
                </th>
                <th>
                    TEMPS
                </th>
                <th>
                    ID
                </th>
                <th>
                    TEMPERATURE MINIMALE
                </th>
                <th>
                    TEMPERATURE MAXIMALE
                </th>
                <th>
                    COMMENTAIRE
                </th>
            </tr>  
            <?php for($i=0; $i<=(count($displayData))-1; $i++):?>
                <tr>
                <?php for($j=0; $j<=7; $j++):?>
                    <td>
                        <?php echo $displayData2[$i][$j];?>
                    </td>
                <?php endfor;?>
                </tr>
            <?php endfor;?>       
        </table>
    </body>
</html>    