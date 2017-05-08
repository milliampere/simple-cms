<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Register</title>
    </head>
    <body>
        <div class="header">
            <hi>Register</h1>
        </div>

        <form method="post" action="Registration.php">
            <table>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="name" class="textInput"></td>
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
                <td>Confirm Password:</td>
                <td><input type="password" name="password2" class="textInput"></td>
                </tr>
                <td></td>
                <td><input type="submit" name="register_button" value="Register"></td>
                </tr>     
            </table>
        </form>
    </body>
    </html>