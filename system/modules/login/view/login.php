<html>
    <head>
        <title>BIMS - Login</title>
    </head>
    
    <body>
        <h4> Welcome to he BIMS - Login </h4>
        
        <form action="../controller/logincontroller.php" method="POST" enctype="multipart/form-data">
            
            <input type="text" name="username" id="username" placeholder="Type your Username" required=""> <!-- this is the input field for username -->
        
            <input type="password" name="password" id="password" placeholder="Type your Password" required=""> <!-- this is the input field for password -->
        
        <input type="submit" value="Login">
        
        </form>
    </body>
</html>

