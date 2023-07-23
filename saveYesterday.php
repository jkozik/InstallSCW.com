<?php
# saveYesterday script should be run via cron hourly at 58 after the hour.
# it will only do saving of the 'yesterday' value if the local time hour is 23
#
# Version 1.00 - 26-Feb-2018 - initial release
#
if(file_exists("Settings.php")) {

        include_once("Settings.php");
        date_default_timezone_set($SITE['tz']);
        $Hnow = date('H');
        $tstamp = date('Y-m-d H:i:s T');
        $doitAnyway = isset($_GET['force'])?true:false;
        if($Hnow == '23' or $doitAnyway) {

          file_put_contents("cache/LOG_saveYesterday.php.txt", "saveYesterday.php local time is $tstamp\n", FILE_APPEND | LOCK_EX);
                #echo "saveYesterday.php local time is $tstamp\n";
    $saveYesterday = true;
    include_once("AWNtags.php");
                return;
        } else {
                #echo "saveYesterday.php $tstamp notice: Hour=$Hnow is not = 23 .. not running the save.\n";
                file_put_contents("cache/LOG_saveYesterday.php.txt", "saveYesterday.php $tstamp notice: Hour=$Hnow is not = 23 .. not running the save.\n",FILE_APPEND | LOCK_EX);
                return;
        }

} else {
        echo "saveYesterday.php Warning: no Settings.php found.\n";
}
?>
