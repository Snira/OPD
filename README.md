# OPD
Online Protection Dashboard

How to install:

1. Clone the project into your destination of choice.

2. Go into the directory of the project (../OPD)

3. Run 'composer install' & 'yarn'

4. Make a custom 'connections.php' and place this file in the /config dir in the project.
    The content of this file should be made op like this:
        
    <?php

return [
        [
            'ipaddr' => 'The IP Adress of your server',
            'port' => The port you whish to use (this variable is nullable),
            'username' => 'Username of your server login',
            'password' => 'Password of your server login'
        ],
    * You can keep adding array's liek the one above within this array for every server you want to monitor. *

        ];


    ?>

5. Run 'php artisan serve' to serve the OPD locally, or use any other web server of choice.

The Online Protection Dashboard should now be running!
