<?php

session_start();

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];

$pdo = new PDO(
    "mysql:host=localhost;dbname=simple-cms;charset=utf8",
    "root",
    "root", $options);

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Register</title>
    </head>
    <body>
        <div class="header">
            <hi>Register</h1>
        </div>

        <form>
            <table>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" class="textInput"></td>
                </tr> 
                 <tr>
                <td>Email:</td>
                <td><input type="email" name="email" class="textInput"></td>
                </tr> 
                 <tr>
                <td>Password:</td>
                <td><input type="password" name="password" class="textInput"></td>
                </tr> 
                 <tr>
                <td>Username:</td>
                <td><input type="text" name="username" class="textInput"></td>
                </tr>    
            </table>
        </form>
    </body>
    </html>
 