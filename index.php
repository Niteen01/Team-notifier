<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team-notifier</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="card">
        <div class="header">
            <h1>Team Notifier</h1>
            <button id="account">
                account's name
            </button>
        </div>
        <div class="nav">
            <div class="see-post">See Posts</div>  
        </div>
        <div class="context-box">
            <div class="upper-context-box">
                <form action="insert.php" method="POST">
                    <input type="text" name="new-task" id="new-task" placeholder="Title">
                        <label for="sort" class="sort">Tag</label>
                        <select name="tag" id = "Tags">
                            <option value="frontend">Frontend</option>
                            <option value="backend">Backend</option>
                        </select>
                    <input type="date" name="deadline" id="deadline">
                    <input type="time" name="time" id="reminder">
                    <input type="text" name="desc" id="description" placeholder="describe a bit">
                <input type="submit" value="Add Task">
                </form>
            </div>
            <div class="lower-context-box">
                
            </div>
        </div>
        
    </div>
    <ul>
        <li>something frontend 02042003 14:02 njasgjklashuifgasdhuiasdhgui<li>
    </ul>
    <script src="./script.js"></script>
</body>
</html>