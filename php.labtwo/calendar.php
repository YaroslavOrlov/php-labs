<?php session_start();
if (isset($_SESSION['email'])): ?>
    <html>
    <head>
        <title>Calendar</title>
        <meta charset="windows-1251">
        <link rel="stylesheet" href="css/style.css"/>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/calendar.js"></script>
    </head>
    <body>
    <p><span>Hello, <?php echo $_SESSION['email'] ?></span> |
        <span><a href="logOut.php">Exit</a></span></p>
    <div class="calendar">
        <?php
        require_once 'get_and_draw_date.php';

        getCalendarDate($week, $month, $day, $year);
        drawCalendar($week, $day);
        ?>
        <form method="post">
            <select style="width:50px; " name="day">
                <?php
                for ($i = 1; $i <= date('t', strtotime("$year-$month-$day")); $i++) {
                    if ($_POST['day'] == $i || $day == $i) {
                        echo "<option id='select_day' selected>$i</option>";
                        continue;
                    }
                    echo "<option>$i</option>";
                }
                ?>
            </select>
            <select style="width:95px; " name="month">
                <?php

                for ($i = 1; $i <= count($enumMonth); $i++) {
                    if ($_POST['month'] == $enumMonth[$i] || $month == $i) {
                        echo "<option id='select_month' selected>$enumMonth[$i]</option>";
                        continue;
                    }
                    echo "<option>$enumMonth[$i]</option>";
                }
                ?>
            </select>
            <select style="width:60px; " name="year">
                <?php
                for ($i = 1900; $i <= date('Y'); $i++) {
                    if ($_POST['year'] == $i || $year == $i) {
                        echo "<option id='select_year' selected>$i</option>";
                        continue;
                    }
                    echo "<option>$i</option>";
                }
                ?>
            </select>
            <input type="submit" value="Select date">
        </form>

        <form id="form-note" method="post" action="addtobase.php">
            <textarea class="text" id="note" wrap="hard"></textarea>
            <br/>
            <button id="note-submit" class="sub-btn" type="submit">Add note</button>
            <button id="note-cancel">Cancel</button>
        </form>
    </div>

    <div id="toggle-note" class="note">
        <button class="delete-note">-</button>
        <div class="notes"></div>
        <button class="add-note">+</button>
    </div>
    </body>
    </html>
<?php else:
    header('Location: http://php.labtwo/authorization.php'); ?>
<?php endif ?>

