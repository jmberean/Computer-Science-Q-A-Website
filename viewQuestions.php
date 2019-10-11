<?php include 'header.php';?>

<div style="padding:20px;padding-top:10px;font-size:60%">
<h1 class="display-4" style="color:white;font-size:20px">All Questions</h1>

<div class="container-fluid table-responsive" style="background:WHITE;padding:20px;border-radius:15px;">

  <input type="text" style="font-size:10px"id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search by ID, Time/Date, User, Class or Topic." title="Type in a name">

<table class="table" id="myTable">

<thead>
  <tr>
  <th scope="col">ID<i class="fa fa-sort" aria-hidden="true" style="margin-left:5px;cursor: pointer;"onclick="sortTable(0)"></i></th>   
  <th scope="col">Time/Date<i onclick="sortTable(1)"class="fa fa-sort" aria-hidden="true" style="margin-left:5px;cursor: pointer;"></i></th>   
  <th scope="col">User<i onclick="sortTable(2)"class="fa fa-sort" aria-hidden="true" style="margin-left:5px;cursor: pointer;"></i></th>
  <th scope="col">Class<i onclick="sortTable(3)"class="fa fa-sort" aria-hidden="true" style="margin-left:5px;cursor: pointer;"></i></th>
  <th scope="col"style="width:20%">Topic<i onclick="sortTable(4)" class="fa fa-sort" aria-hidden="true" style="margin-left:5px;cursor: pointer;"></i></th>
  <th scope="col"style="width:20%">Subject<i onclick="sortTable(5)"class="fa fa-sort" aria-hidden="true" style="margin-left:5px;cursor: pointer;"></i></th>
  <th scope="col" style="width:25%">Question<i onclick="sortTable(6)"class="fa fa-sort" aria-hidden="true" style="margin-left:5px;cursor: pointer;"></i></th>
  </tr>
</thead>
<tbody>

<?php
 $servername = "wyvern.cs.newpaltz.edu";$sqlusername = "csteam";$password = "j8wez0";$dbname = "csteam_db";
 $conn = new mysqli($servername, $sqlusername, $password, $dbname);
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 } 
 $signal=0;
 $sql = "SELECT * FROM csteamQuestions";
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
date_default_timezone_set("America/New_York");
$date = date_create($row["dateTime"]);
 echo date_format($date, 'h:i A - m/d/Y');
              ?>
          </td>
          <td>
              <?php 
              echo $row["userID"];
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
        $signal = 1;
}
$conn->close();
?>
</tbody>


</table>
<?php
if($signal==1){
  ?>
   <div class="alert alert-primary" role="alert">
      <?php
      echo "No questions yet.";
      ?>
    </div>      
    <?php
}
?>


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
    for (c = 0; c < 5; c++) {
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
