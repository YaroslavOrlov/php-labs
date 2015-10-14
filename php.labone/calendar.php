<html>
<head>
	<title></title>
	<meta charset="windows-1251">
</head>
<body>
<div style="margin: 0 auto; width: 300px;">
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
						echo "<td style='background-color: #07f2ff; width: 50px; height: 30px;
							  border: 3px solid #3891fc; text-align: center'>"
							. $week[$i][$j] . "</td>";
						$select = false;
						continue;
					}
					if ($j == 5 || $j == 6) {
						echo "<td style='color:#ff001c; width: 50px; height: 30px; text-align: center'>"
							. $week[$i][$j] . "</td>";
						continue;
					}
					echo "<td style='color:#015c0e; width: 50px; height: 30px; text-align: center'>"
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

	getCalendarDate($week, $month, $day, $year);
	drawCalendar($week, $day);
	?>

	<form method="post">
		<select style="width:50px; " name="day">
			<?php
			for ($i = 1; $i <= date('t', strtotime("$year-$month-$day")); $i++) {
				if ($_POST['day'] == $i) {
					echo "<option selected>$i</option>";
					continue;
				}
				echo "<option>$i</option>";
			}
			?>
		</select>
		<select style="width:95px; " name="month">
			<?php

			for ($i = 1; $i <= count($enumMonth); $i++) {
				if ($_POST['month'] == $enumMonth[$i]) {
					echo "<option selected>$enumMonth[$i]</option>";
					continue;
				}
				echo "<option>$enumMonth[$i]</option>";
			}
			?>
		</select>
		<select style="width:60px; " name="year">
			<?php
			for ($i = 1900; $i <= date('Y'); $i++) {
				if ($_POST['year'] == $i) {
					echo "<option selected>$i</option>";
					continue;
				}
				echo "<option>$i</option>";
			}
			?>
		</select>
		<input type="submit" value="Select date">
	</form>
</div>
</body>
</html>

