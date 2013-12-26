SET SCRIPT_PATH=%~dp0

SET DB_USERNAME=root
SET DB_PASSWORD=medeolinx
SET DB_NAME=caiwen

SET SQL_PATH=%SCRIPT_PATH%..\..\sql

ECHO OFF
SET SCRIPT_PATH=%~dp0


echo ##########  ##################
echo ##########  ##################
echo ##########  ##################
echo ##########     ###############


mysql --default-character-set=utf8  -u %DB_USERNAME% -p%DB_PASSWORD% information_schema<%SQL_PATH%/caiwen.dcl
mysql --default-character-set=utf8  -u %DB_USERNAME% -p%DB_PASSWORD% %DB_NAME%<%SQL_PATH%/caiwen.sql

echo ------------------------------
echo Database created successfully!

mysql --default-character-set=utf8  -u %DB_USERNAME% -p%DB_PASSWORD% %DB_NAME%<%SQL_PATH%/caiwen_data.sql

echo import data successfully!
echo by Lucups
echo -----------------------------

echo ##############################
echo # #### # #   # # #  #   ######
echo # #### # # ### # #  # ########
echo #   ##   #   #   # ## #  #####
echo ##############################

REM mysql --default-character-set=utf8  -u %DB_USERNAME% -p%DB_PASSWORD% %DB_NAME%<%SQL_PATH%/tw_test.sql

PAUSE
cls