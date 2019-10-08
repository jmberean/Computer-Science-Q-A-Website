<?php
require_once('header.php'); 
if(!isset($_SESSION['userName2'])){
  header("location:login.php");
  die();
}
$servername = "wyvern.cs.newpaltz.edu";$sqlusername = "csteam";$password = "j8wez0";$dbname = "csteam_db";
$conn = new mysqli($servername, $sqlusername, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
} 
if($conn){
  $userName2=($_SESSION['userName2']);
  $sql="SELECT * FROM csteamUsers WHERE userName ='$userName2'";
  $result=$conn->query($sql);
  $result = mysqli_query($conn, $sql); 
  if ($result && mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc();
?>
<!-- <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js?lang=ruby&amp;skin=default">
</script>
<pre class="prettyprint">
</pre>       -->


<div style="padding:20px;padding-top:10px;font-size:60%">
<div class="container-fluid" style="background:WHITE;border-radius:10px;padding:10px">

    <?php
    if(isset($_SESSION['message'])){
    ?>
    <div class="alert alert-primary" role="alert">
      <?php
      echo "<div id='error_msg'>".$_SESSION['message']."</div>";
      ?>
    </div>      
    <?php      
        unset($_SESSION['message']);
    }
    ?>


    <div class="col" >

    <div class="container-fluid table-responsive">

    <h1 style="font-size:20px"><i class="fas fa-user mr-3"></i><?php echo $row["userName"];?>'s Questions</h1>
    <?php
  }else{
    $_SESSION['message']="Username or Password incorrect!";
    header("location:loginPage.php");
  }
}
?>
    <input type="text" id="myInput" style="font-size:10px" class="form-control" onkeyup="myFunction()" placeholder="Search by ID, Time/Date, Class or Topic." title="Type in a name">

    <table class="table" id="myTable">

    <thead>
      <tr>
      <th scope="col">ID<i onclick="sortTable(0)"class="fa fa-sort" aria-hidden="true" style="margin-left:5px;cursor: pointer;"></i></th>   
      <th scope="col">Time/Date<i onclick="sortTable(1)"class="fa fa-sort" aria-hidden="true" style="margin-left:5px;cursor: pointer;"></i></th>   
      <th scope="col">Class<i onclick="sortTable(2)"class="fa fa-sort" aria-hidden="true" style="margin-left:5px;cursor: pointer;"></i></th>
      <th scope="col"style="width:20%">Topic<i onclick="sortTable(3)"class="fa fa-sort" aria-hidden="true" style="margin-left:5px;cursor: pointer;"></i></th>
      <th scope="col"style="width:20%">Subject<i onclick="sortTable(4)"class="fa fa-sort" aria-hidden="true" style="margin-left:5px;cursor: pointer;"></i></th>
      <th scope="col" style="width:25%">Question<i onclick="sortTable(5)"class="fa fa-sort" aria-hidden="true" style="margin-left:5px;cursor: pointer;"></i></th>

      </tr>
    </thead>
    <tbody>

    <?php
    session_start();
    $userName2 = $_SESSION['userName2'];
    $sql = "SELECT * FROM csteamQuestions WHERE userID = '$userName2'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $id = $row["ID"];
          $str = "./vSingle.php?id=$id";
          ?>
          <tr onclick="window.location='<?php echo $str; ?>'" style="cursor: pointer;">
          <td>
          <?php 
              echo $row["ID"];
              ?>
          </td>
          <td>
          <?php 
                        $date = date_create($row["dateTime"]);
                        echo date_format($date, 'h:i A <\b\r> m/d/Y');
              // echo $row["dateTime"];
              ?>
          </td>
          <td>
              <?php 
              echo $row["subject"];
              ?>
          </td>
          <td>
              <?php 
              echo htmlspecialchars($row["topic"]);
              ?>
          </td>

          <td>
              <?php 
              echo htmlspecialchars($row["point"]);
              ?>
          </td>

          <td>
          <?php 
              if(strlen($row['data']) > 150){
                echo  nl2br(htmlspecialchars(substr($row['data'], 0, 150)));
                ?>
                <p style="display:inline;color:blue"> ... (Click to view full question)</p>
                <?php
              }else{
                echo  nl2br(htmlspecialchars($row['data']));
              }
              // echo  nl2br(substr($row['data'], 0, 100));
              // echo nl2br($row["data"]);
              ?>

          </td>

          </tr>
    <?php }} else {
         $_SESSION['message1']="No questions yet!";
        
    }
    $conn->close();
    ?>
    </tbody>



 </table>
 <?php      

if(isset($_SESSION['message1'])){
      ?>
      <div class="alert alert-primary" role="alert" style="text-align:center">
        <?php
        echo $_SESSION['message1'];
        ?>
      </div>      
      <?php      
          unset($_SESSION['message1']);

      }?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 1; i < tr.length; i++) {
    for (c = 0; c < 4; c++) {
      txtValue += tr[i].children[c].innerText + " "
    }
    if (txtValue) {
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
        txtValue = "";
      }
  }  
}
</script>

<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc"; 
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++; 
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
sortTable(1);
</script>

<?php include 'footer.php';?>
