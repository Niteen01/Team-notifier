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
    <link rel="stylesheet" href="./style3.css">
</head>
<body>
    <div class="card">
        <div class="header">
            <h1 id="brand">Team Notifier</h1>
            <div>
            <?php echo $_SESSION['name']?>
            <a href="logout.php">Logout</a>
            </div>
        </div>
        <div class="nav">
            <div class="see-post">See Posts</div> 
            <div>
            <form action="sorted.php" method="POST">
            <label for="sort" class="sort">Sort by-</label>
                        <select name="sortby" id = "Tags">
                            <option value="frontend">Frontend</option>
                            <option value="backend">Backend</option>
                        </select>
                        <input type="submit" value="submit">
            </form>
            </div> 
        </div>
        <div class="context-box">
            <div class="upper-context-box">
                <form action="test.php" method="POST">
                    <input type="text" name="new-task" id="new-task" placeholder="Title">
                        <label for="sort" class="sort">Tag</label>
                        <select name="tag" id = "Tags">
                            <option value="frontend">Frontend</option>
                            <option value="backend">Backend</option>
                        </select>
                    <input type="date" name="deadline" id="deadline">
                    <input type="time" name="time" id="reminder">
                    <input type="text" name="desc" id="description" placeholder="describe a bit">
                <input type="submit" name="submit" value="submit">
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
    include "config.php";
    $db = new Database();
    if(isset($_POST['sortedby'])){
        $result=$db->select('lists ORDER BY tag ASC;', '*', '');
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
                    <div class="child-container"><?php echo $row['title'] ?></div>
                    <div class="child-container"><?php echo $row['tag'] ?></div>
                    <div class="child-container"><?php echo $row['date'] ?></div>
                    <div class="child-container"><?php echo $row['time'] ?></div>
                    <div class="child-container"><?php echo $row['description'] ?></div>
                    <div><a href="progress.php?id=<?php echo $row["ID"]; ?>" class="progress">Inprogress </a></div>
                    <div><a href="fixed.php?id=<?php echo $row["ID"]; ?>" class="Fixed">Fixed </a></div>
                    <div><a href="delete.php?id=<?php echo $row['ID'];?>" class="delete">Delete</a></div> 
                </div> 
                <?php
                }
            ?>
    </div> 
    <!-------------------------<script src="./script.js"></script>-------------------------------------->
</body>
</html>