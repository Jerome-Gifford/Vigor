@ECHO OFF

ECHO STARTING XAMPP MYSQL
TIMEOUT /T 2
REM Total Delay = 5 seconds
START "STARTING XAMPP MYSQL" "C:\xampp\xampp-control.exe"

ECHO STARTING SUBLIME
TIMEOUT /T 2
REM Total Delay = 5 seconds
START "STARTING SUBLIME" "C:\Program Files\Sublime Text 3\sublime_text.exe"

ECHO RUNNING COMPOSER UPDATE
call composer self-update

ECHO RUNNING COMPOSER UPDATE
call composer update

ECHO RUNNING BOWER INSTALL
call bower install

ECHO OPENING CHROME LOCALHOST
call %~dp0cmds\chrome.bat

ECHO START LOCAL SERVER
call php artisan serve


