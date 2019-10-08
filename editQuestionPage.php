<?php include 'header.php';?>

    <div class="container" style="background:WHITE;margin-top:10px;border-radius:15px;padding: 30px;padding-top:10px;">
          <div class="container">
            <h1 class="display-4"style ="font-size:30px">Edit</h1>
            <p class="lead" style ="font-size:20px">Feel free to edit any of the following information regarding the question.</p>
            <hr class="my-4">

            <form action="editQuestion.php" method="POST">

            <?php
            $servername = "wyvern.cs.newpaltz.edu";$sqlusername = "csteam";$password = "j8wez0";$dbname = "csteam_db";
            $conn = new mysqli($servername, $sqlusername, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            $id = $_SESSION['id'];
            $sql = "SELECT * FROM csteamQuestions WHERE ID ='$id'";
            $result = $conn->query($sql);
            $row = mysql_fetch_array($result);
            if ($result) {
                $row = $result->fetch_assoc();
            ?>


            <div class="form-group">
                <label for="exampleFormControlSelect1"style="font-size:15px;font-weight:bold">Class:</label>
                <select style="font-size:15px"class="form-control" name ="subject" id="exampleFormControlSelect1" required="required">
                
                  <?php if($row["subject"]=="CS1"){ ?>
                    <option selected>CS1</option>
                    <option>CS2</option>
                  <?php }else{ ?>
                    <option>CS1</option>
                    <option selected>CS2</option>
                  <?php } ?>
            
                </select>
              </div>
            <div class="form-group">
                <label for="exampleInputEmail1"style="font-size:15px;font-weight:bold">Topic:</label>
                <input style="font-size:15px"type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Strings, Arrays, Lists, etc... (10 characters max)" maxlength="50" name="topic"  required="required" value="<?php echo $row["topic"];?>">
            </div>
            <div class="form-group">
                <label style="font-size:15px;font-weight:bold" for="exampleInputEmail1">Subject:</label>
                <input style="font-size:15px"type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Describe your question briefly in (100 characters max)" maxlength="100" name="point"  required="required" value="<?php echo $row["point"];?>">
            </div>
            <div class="form-group" style="margin-bottom:0px">
              <label style="font-size:15px;font-weight:bold"for="comment">Question:</label>
              <textarea maxlength="10000" style="font-size:15px"class="form-control" rows="10" id="comment" required="required" placeholder="Enter question here (10,000 characters max)" name = "data" value=""><?php echo $row["data"];?></textarea>
            </div>

              <br><br>    
              <button type="submit" class="btn btn-primary btn-md" style="margin-bottom:20px;margin-top:0;font-size:15px">Submit</button>

            </form> 
            <?php
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
          </div>
       </div> 
     
<?php include 'footer.php';?>
