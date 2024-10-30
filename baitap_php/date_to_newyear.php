<?php

$date_now = new DateTime("now", new DateTimeZone("Asia/Ho_Chi_Minh"));
$new_year = new DateTime("2025-1-1 00:00:00 +7");
$date = $date_now->diff($new_year);
header("Refresh: 1");

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="date_to_newyear.css">
</head>

<body>
    <div class="background">
        <div class="main">
            <div class="block">
                <div class="number">
                    <?php echo $date->format("%a") ?>
                </div>
                <div>
                    <span>DAYS</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="block">
                <div class="number">
                    <?php echo $date->format("%H") ?>
                </div>
                <div>
                    <span>HOURS</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="block">
                <div class="number">
                    <?php echo $date->format("%I") ?>
                </div>
                <div>
                    <span>MINUTES</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="block">
                <div class="number">
                    <?php echo $date->format("%S") ?>
                </div>
                <div>
                    <span>SECONDS</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="finish">
            <span>Time until Wednesday, 1 January 2025</span>
        </div>
        <div class="clear"></div>
    </div>


</body>

</html>