# bikes-around-the-world
E-commerce example with Paypal button implemented

That project is coded with MYSQL, PHP, JS, SCSS. I'm creating a Bikes' e-commerce called "Bikes around the world".

If you want implement that code you need: 

A data base with the example structure in the sql database/structure.sql
You need change credentials data base in the file includes/db_connect.php
CODE
....
$servername = 'localhost';
  $username = 'YOUR_USERNAME_DATABASE'; <--- HERE
  $password = 'YOUR_PASSWORD_DATABASE'; <--- HERE
  $db = 'YOUR_DB_NAME';                 <--- HERE
....
END CODE.

You need a Paypal developer account and generate the Key app in pay.php file: 
CODE: 
paypal.Button.render({
    .....
    client: {
        sandbox: 'SANDBOX_KEY', <-- HERE
        production: 'PRODUCTION_KEY' <-- HERE
    },
    
 END CODE.

Paypal give you account test too, if you want test the pay.
