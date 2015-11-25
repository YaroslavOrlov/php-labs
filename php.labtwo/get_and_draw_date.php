<?php
$week;
$enumMonth = array(1 => 'january', 'february', 'march', 'april', 'may', 'june', 'july', 'august',
    'september', 'october', 'november', 'december');

$day = isset($_POST['day']) ? $_POST['day'] : date('d');
$month = isset($_POST['month']) ? array_search($_POST['month'], $enumMonth) : date('m');
$year = isset($_POST['year']) ? $_POST['year'] : date('Y');

function getCalendarDate(&$week, $month, $day, $year)
{
    $days_in_month = date('t', mktime(0, 0, 0, $month, $day, $year));
    $day_count = 0;

    $num = 0;

    for ($i = 0; $i < 7; $i++) {
        $day_of_week = date('w', mktime(0, 0, 0, $month, $day_count, $year));

        $day_of_week = $day_of_week - 1;

        if ($day_of_week == -1) {
            $day_of_week = 6;
        }

        if ($day_of_week == $i) {

            $week[$num][$i] = $day_count;

            $day_count++;
        } else {
            $week[$num][$i] = "";
        }
    }
    while ($days_in_month >= $day_count) {
        $num++;
        for ($i = 0; $i < 7; $i++) {
            $week[$num][$i] = $day_count;
            $day_count++;
            if ($day_count > $days_in_month) {
                break;
            }
        }
    }
}
function drawCalendar($week, $day)
{
    echo "<table border=1 style='border-collapse: collapse'>";

    echo "<tr style='background-color: cadetblue; width: 50px; height: 30px; text-align: center'>" .
        "<td>Mo</td>" . "<td>Tu</td>" . "<td>We</td>" . "<td>Th</td>" . "<td>Fr</td>" .
        "<td>Sa</td>" . "<td>Su</td>" . "</tr>";

    $i = 0;
    $counter_i = 5;
    $select = true;
    if ($week[0][6] == 0) {
        $i = 1;
    }
    if (!empty($week[5][0])) {
        $counter_i = 6;
    }

    while ($i < $counter_i) {
        echo "<tr>";
        for ($j = 0; $j < 7; $j++) {
            if (!empty($week[$i][$j])) {
                if ($day == $week[$i][$j] && $select) {
                    echo "<td class='touch' style='background-color: #07f2ff; width: 50px; height: 30px;
							  border: 3px solid #3891fc; text-align: center'>"
                        . $week[$i][$j] . "</td>";
                    $select = false;
                    continue;
                }
                if ($j == 5 || $j == 6) {
                    echo "<td class='weekend touch'>"
                        . $week[$i][$j] . "</td>";
                    continue;
                }
                echo "<td class='workday touch'>"
                    . $week[$i][$j] . "</td>";
            } else {
                echo "<td>&nbsp;</td>";
            }
        }
        echo "</tr>";
        $i++;
    }
    echo "</table>";
}

?>