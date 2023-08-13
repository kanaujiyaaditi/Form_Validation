
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="formcss.css">
</head>
<body>
    <div class="main">
        <div>
          <form action="#" method="post">
            <label for="">Full Name :</label>
            <input type="text" name="Name" required />
            <br />
            <br />
            <label for="">Phone Number :</label>
            <input type="number" name="number"required />
            <br />
            <br />
            <label for="">E-mail :</label>
            <input type="email" name="Email" required/>
            <br />
            <br />
            <label for="">Subject :</label>
            <input type="text" name="subject" required/>
            <br />
            <br />
            <label for="">Message :</label>
            <textarea name="area" id="" cols="30" rows="6" required></textarea>
            <br />
            
            <br />
      
            <input class="btn" type="submit" />
            <span><b><?php include 'Welcome.php';?></b></span>
          </form>
        </div>
      </div>
</body>
</html>


