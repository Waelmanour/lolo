 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
    <h2>save your data</h2>
    <form action="home.php" method="post">
        <label for="id">ID:</label>
        <input type="text" id="id" name ="id">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name">

        <label for="address">Address:</label>
        <input type="text" id="address" name="address">

        <input type="submit" value="Save" name="Save">
        <input type="submit" value="Edit" name="Edit">
        <input type="submit" value="Delete" name="Delete">
        <input type="submit" value="Display" name="Display">


    </form>
    <?php
    if(isset($_POST["Save"])){//isset معناها حصل كليك علي الباطون
        $id=$_POST["id"];
        $name=$_POST["name"];
        $address=$_POST["address"];// data >> html>> php var >> conn >> DB(usres)
        $link=mysqli_connect("127.0.0.1","root","","realmadrid");
        $result = mysqli_query($link, "INSERT INTO  users (`id`,`name`, `address`)  
VALUES ('$id','$name','$address')");
         mysqli_close($link);
    }
      if(isset($_POST["Edit"])){
        $id=$_POST["id"];
        $name=$_POST["name"];
        $address=$_POST["address"];
        $link=mysqli_connect("127.0.0.1","root","","realmadrid");
        $result=mysqli_query($link,$sql1=("update users set name='$name' WHERE id like '$id'"));
        mysqli_close($link);
      }
      if(isset($_POST["Delete"])){
        $id=$_POST["id"];
        $name=$_POST["name"];
        $address=$_POST["address"];
        $link=mysqli_connect("127.0.0.1","root","","realmadrid");
        $result=mysqli_query($link,"Delete From users WHERE id like '$id'");
        mysqli_close($link);
      }
      if(isset($_POST["Display"])){
        $id=$_POST["id"];
        $name=$_POST["name"];
        $address=$_POST["address"];
        $link=mysqli_connect("127.0.0.1","root","","realmadrid");
        $result=mysqli_query($link, "SELECT * FROM users");
        $count = mysqli_num_rows($result); 
    $data = []; 
    while ($row = mysqli_fetch_assoc($result)) { 
        $data[] = $row; 
    } 
    if ($count == 0) { 
        echo "<No result matches </h3>"; 
    } else { 
        echo "<table border=1> 
                            <tr> 
                                 <th >ID</th> 
                                 <th >Name</th> 
                                  <th >Address</th>                                                        
                            </tr>"; 
        for ($i = 0; $i < $count; $i++) { 
            $id = $data[$i]["id"]; 
            $name = $data[$i]["name"]; 
            $address = $data[$i]["address"]; 
            echo "<tr>"; 
            echo "<td>" . $id . "</td>"; 
            echo "<td>" . $name . "</td>"; 
            echo "<td>" . $address . "</td>"; 
        } 
        echo "</table>"; 
    }
      }




    
    ?>
 </body>
 </html>