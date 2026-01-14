<?php
function generateTable($months) {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>Year</th><th>Month</th></tr>";
    
    for ($i = $months; $i > 0; $i--) {
        $date = new DateTime();
        $date->modify("-$i months");
        
        echo "<tr>";
        echo "<td>" . $date->format("Y") . "</td>";
        echo "<td>" . $date->format("F") . "</td>"; // Full month name in English
        echo "</tr>";
    }
    
    echo "</table>";
}

// 6 oy yoki 12 oy jadval yaratish
$months = 24; // yoki 12
generateTable($months);
?>
