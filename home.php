<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team-notifier</title>
    <link rel="stylesheet" href="./style11.css">
</head>
<body>
    <div class="card">
        <div class="header">
            <h1 id="brand">Team Notifier</h1>
            <div class="right-acc">
            <?php echo $_SESSION['name']?>
            <a class="log-out" href="logout.php">Logout</a>
            </div>
        </div>
        <div class="about" >
        <p> Team Notifier offers a straightforward approach for sharing errors and bugs within your team, while also requesting everyone's assistance in resolving specific tasks.</p>
        </div>
    <div class="bigger-box">
        <div>
            <h3> ADD TASK :- </h3>
        </div>
        
        <div class="context-box">
       
            <div class="upper-context-box">
            <form action="test.php" method="POST">
             <div class="error-success">
                <?php if (isset($_GET['error'])) { ?>
     		        <p class="error"><?php echo $_GET['error']; ?></p>
     	        <?php } ?>

                 <?php if (isset($_GET['success'])) { ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
                <?php } ?>
                 </div>
                
                    
                    <div>
                    <label >Title</label>
                    <?php if (isset($_GET['new-task'])) { ?>
               <input type="text" 
                      name="new-task" 
                      placeholder="title"
                      value="<?php echo $_GET['new-task']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="new-task" 
                      placeholder="title"><br>
          <?php }?>
                    </div>
                    <div>
                        <label for="sort" class="sort">Tag</label>
                        <select name="tag" id = "Tags">
                            <option value="frontend">Frontend</option>
                            <option value="backend">Backend</option>
                        </select>
                    </div>
                    <div>
                    <label for="date" class="date">Date</label>
                    <?php if (isset($_GET['deadline'])) { ?>
               <input type="date" 
                      name="deadline" 
                      placeholder=""
                      value="<?php echo $_GET['deadline']; ?>"><br>
          <?php }else{ ?>
               <input type="date" 
                      name="deadline" 
                      placeholder=""><br>
          <?php }?>
                    </div>
                    <div>
                    <label for="time" class="time">Time</label>
                    <input type="time" name="time" id="reminder">
                    </div>
                    <div>
                    <label for="desc" class="desc">Describe</label>
                    <?php if (isset($_GET['desc'])) { ?>
                    <input type="text" 
                      name="desc" 
                      placeholder="describe a bit"
                      id="description"
                      value="<?php echo $_GET['desc']; ?>"><br>
                    <?php }else{ ?>
                    <input type="text" 
                      name="desc" 
                      id="description"
                      placeholder="describe a bit"><br>
                    <?php }?>
                    </div>
                <input type="submit" name="submit" value="Add Task" id="submit">
                </form>
            </div>
        </div>
    </div>

        <div class="nav">
            <div class=nav-container><div class="see-post">See Posts</div></div> 
            <div>
            <form class= "sort-menu" action="sorted.php" method="POST">
                <div>
            <label for="sort" class="sort">Sort by-</label>
                        <select name="sortby" id = "Tags">
                            <option value="frontend">Frontend</option>
                            <option value="backend">Backend</option>
                        </select>
                </div>
                        <input type="submit" value="Apply Sort" id="submit">
            </form>
            </div> 
        </div>
    <!---------------------- reflecting data------------------------------------------------>
    <div class="top-header" >
                <div class="child-container">Title</div>
                <div class="child-container">Tag</div>
                <div class="child-container">Date</div>
                <div class="child-container">Time</div>
                <div class="child-container">Details</div>
                <div class="status">Status</div>
                <div class="actions">Actions</div> 
        </div>

<?php
    //include "sorted.php";
    include "config.php";
    $db = new Database();
    //$result = sorted();
    if(isset($_GET['value'])){
    $sortby=$_GET['value'];
        if($sortby=='frontend'){
        $result = $db->select('lists ORDER BY tag DESC', '*', );
        }
        else{
        $result = $db->select('lists ORDER BY tag ASC', '*', );
        }
    // echo $result;
    }
    else{
        $result=$db->select("lists","*", );
    } 

    
    
    // $name=$_GET['name'];

?>         
                <?php
                $rows = array();
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                        if($row['progress']==0){
                            $classname='container1';
                        }
                        else if($row['progress']==1){
                            $classname='container2';
                        }
                        else{
                            $classname='container3';
                        }
                ?>
                <div class= <?php $classname; echo $classname?> >
                <div class="box1">
                    <div class="child-container"><?php echo $row['title'] ?></div>
                    <div class="child-container addedby"><?php echo $row['addedby'] ?></div>
                </div>
                    <div class="child-container"><?php echo $row['tag'] ?></div>
                    <div class="child-container"><?php echo $row['date'] ?></div>
                    <div class="child-container"><?php echo $row['time'] ?></div>
                    <div class="child-container"><?php echo $row['description'] ?></div>
                    <div class="box2">
                        <div class="box2one">
                    <div><a href="progress.php?id=<?php echo $row["ID"]; ?>" class="progress">Inprogress </a></div>
                    <div><a href="fixed.php?id=<?php echo $row["ID"]; ?>" class="Fixed">Fixed </a></div>
                        </div>
                        <div class="fixedby"><?php echo $row['fixedby']?></div>
                    </div>
                    <div><a href="delete.php?id=<?php echo $row['ID'];?>" class="delete">Delete</a></div> 
                </div> 
                <?php
                }
            ?>
    </div> 
    <!-------------------------<script src="./script.js"></script>-------------------------------------->
</body>
</html>