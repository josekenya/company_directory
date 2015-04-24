# Company  Directory
##Installation
    Simply Download the zipped file of this repository and extract it to your xampp or wampp.
    Access it on the browser through  http://localhost/company_directory.
    The sql file is inside the /dump folder.
###Troubleshooting
      Database connection errors.
         Open your text editor and navigate to application/config/database.php
         Sroll down to the password configuration variable and change from $db['default']['password'] = 'password'; to    $db['default']['password'] = '';
         Incase there is no issue with connection just leave it as it is.
      Mysql database password configuration (soon)     
