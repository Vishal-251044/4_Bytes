<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
 

    <div class="min-h-full">
        <nav class="bg-gray-800">
          <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
              <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-20 w-20" src="src/logo.png" alt="Your Company">
                </div>
                <div class="hidden md:block">
                  <div class="ml-10 flex items-baseline space-x-4">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="index.html" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Home</a>
                    <a href="register.html" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Register</a>
                    <a href="records.php" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Records</a>
                    <a href="about.html" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">About</a>
                  </div>
                </div>
              </div>
              <div class="-mr-2 flex md:hidden">

        </nav>
    </header>
    <main>
      <body style="padding: left 20px;">
      <br>
      <h1 style="text-align:center;font-size: 50px;"><b>List Of Patients</b></h1>
      <div style="margin-left: 1200px;">
      <form method="post">
        <label for="" ><b>search</b></label><br>
        <input type="text" name="search">
        <input type="submit" name="submit" style="background-color:green;padding: 10px;border: 5px;">
      </form>
      </div>
      <?php

$con = new PDO("mysql:host=localhost;dbname=patient_records",'root','');

if (isset($_POST["submit"])){
  $search = $_POST["search"];
  $sth = $con->prepare("SELECT * FROM user_info WHERE ID = :ID");
  $sth->bindParam(':ID', $search, PDO::PARAM_STR);
  $sth->setFetchMode(PDO::FETCH_OBJ);
  $sth->execute();

  if($row = $sth->fetch()){
   ?>
   <br>
   <h1><b>Search Result:</b></h1>
   <br>
   <table class="table" style="border: 1px solid black;">
   <tr>
            <th style="background-color: lightgreen;">ID</th>
            <th style="background-color: LightGreen;">First Name</th>
            <th style="background-color: LightGreen;">Middle Name</th>
            <th style="background-color: LightGreen;">Last Name</th>
            <th style="background-color: LightGreen;">Email</th>
            <th style="background-color: LightGreen;">Contact No.</th>
            <th style="background-color: LightGreen;">Address</th>
            <th style="background-color: LightGreen;">Height</th>
            <th style="background-color: LightGreen;">Weight</th>
            <th style="background-color: LightGreen;">Heredity</th>
          </tr>
          <tr>
          <td><?php echo $row->ID; ?></td>
          <td><?php echo $row->Fname; ?></td>
          <td><?php echo $row->Mname; ?></td>
          <td><?php echo $row->Lname; ?></td>
          <td><?php echo $row->email; ?></td>
          <td><?php echo $row->mobNo; ?></td>
          <td><?php echo $row->address; ?></td>
          <td><?php echo $row->height; ?></td>
          <td><?php echo $row->weight; ?></td>
          <td><?php echo $row->heredity; ?></td>
          </tr>
   </table>
   <?php
  }
  else{
    echo "<h1><b>Search Result:<br></b></h1>";
    echo "<br><p><b>User not found</b></p><br>";
    
  }
}
?>
      <br>
      <table class="table" style="border: 1px solid black; padding: 50px;">
        <thead>
          <tr>
            <th style="background-color: yellow;">ID</th>
            <th style="background-color: yellow;">First Name</th>
            <th style="background-color: yellow;">Middle Name</th>
            <th style="background-color: yellow;">Last Name</th>
            <th style="background-color: yellow;">Email</th>
            <th style="background-color: yellow;">Contact No.</th>
            <th style="background-color: yellow;">Address</th>
            <th style="background-color: yellow;">Height</th>
            <th style="background-color: yellow;">Weight</th>
            <th style="background-color: yellow;">Heredity</th>
          </tr>
          <tbody>
            <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $database = "patient_records";

          $connection = new mysqli($servername,$username ,$password, $database);

          if($connection->connect_error){
            die("connextion failed" . $connection->connect_error);
          }

          $sql ="SELECT * FROM user_info";
          $result=$connection->query($sql);

          if(!$result){
            die("invalid query" . $connection->error );
          }
          while($row=$result->fetch_assoc()){
            echo"<tr>
            <td>".$row["ID"]."</td>
            <td>".$row["Fname"]."</td>
            <td>".$row["Mname"]."</td>
            <td>".$row["Lname"]."</td>
            <td>".$row["email"]."</td>
            <td>".$row["mobNo"]."</td>
            <td>".$row["address"]."</td>
            <td>".$row["height"]."</td>
            <td>".$row["weight"]."</td>
            <td>".$row["heredity"]."</td>
          </tr>";

          }
          ?>

            
            
          </tbody>
        </thead>
      </table>
      
      
      </div>
      </body>
    </main>
    
  </div>
</body>
</html>



