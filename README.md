# Library-System
simple library system based on mysql &amp; php
a project of COMP S351F

reused some code in https://github.com/yfc0307/Online-Voting-System

**Installation Tutorials**
XAMPP Installation: https://www.youtube.com/watch?v=r0lDDeVkaks

After downloading source code from [here](https://github.com/yfc0307/Library-System/archive/refs/heads/main.zip)

extract the files to '*where you downloaded your xampp*\xampp\htdocs'

rename the file name from 'Library-System' to 'library' (you may not do so if you don't mind typing a longer url everytime)

open xampp and turn on **Apache** and **MySQL**. (If you have trouble, watch the youtube tutorial again)

open browser and type in 'http://localhost/phpmyadmin/index.php'.

create a new database and name it 'library'.

click the 'library' database you just created.

click Import and you should find a place for you to attach a file.

you may find the 'library.sql' file in '*where you downloaded your xampp*\xampp\htdocs\library\database' (or '*where you downloaded your xampp*\xampp\htdocs\Library-System\database' if you didn't rename it)

attach the library.sql, then click the Import button at the bottom.

then open another browser and type in 'http://localhost/library/homepage.php' (or http://localhost/Library-System/homepage.php if you didn't rename it)

you should be able to see the homepage of the system.
