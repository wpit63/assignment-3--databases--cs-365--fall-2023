<?php
require "includes/helpers.php"

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Working with a Passwords Database</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@500&family=IBM+Plex+Sans:ital,wght@100;200;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <h1>Working with a Passwords Database</h1>
  </header>
  <main>
    <section>
    <form method="post">
        <input type="submit" name="reset" id="reset" value="RESET" /><br/>
    </form>
    <?php
        function cleanDB() {
            include_once "includes/config.php";

            $db = new PDO("mysql:host=".DBHOST."; dbname=".DBNAME,
            DBUSER,
            DBPASS);

            $statement = $db -> prepare("DROP TABLE IF EXISTS website");
            $statement -> execute();
            $statement = null;

            $statement = $db -> prepare("DROP TABLE IF EXISTS account");
            $statement -> execute();
            $statement = null;

            $statement = $db -> prepare("CREATE TABLE website (
                    web_domain  CHAR(255)     NOT NULL,
                web_name    CHAR(128)     NOT NULL,

                PRIMARY KEY (web_domain)
              )");
            $statement -> execute();
            $statement = null;

            $statement = $db -> prepare("CREATE TABLE account (
                web_domain  CHAR(255)     NOT NULL,
                username    CHAR(64)      NOT NULL,
                email       CHAR(128)     NOT NULL,
                p_word      CHAR(64)      NOT NULL,
                comment     TEXT(65535)           ,

                PRIMARY KEY (web_domain, p_word)
              )");
            $statement -> execute();
            $statement = null;

            $statement = $db -> prepare("INSERT INTO website VALUES
                ('https://www.youtube.com', 'YouTube'),
                ('https://www.twitter.com', 'Twitter'),
                ('https://github.com', 'GitHub'),
                ('https://www.linkedin.com', 'LinkedIn'),
                ('https://www.microsoft.com', 'Microsoft')
              ");
            $statement -> execute();
            $statement = null;

            $statement = $db -> prepare("INSERT INTO account VALUES
                ('https://www.youtube.com', 'Billy Channel', 'billy@gmail.com', 'bobrules!', 'My channel'),
                ('https://www.twitter.com', 'vmays90', 'victormays@gmail.com', 'stay_OUT', 'i mean it'),
                ('https://github.com', 'empress5', 'empress5@hotmail.com', 'relaire', 'blah blah'),
                ('https://www.linkedin.com', 'Mari_G', 'mari@outlook.com', 'sunny', 'this is a comment'),
                ('https://www.microsoft.com', 'starlight_actress', 'kaijou@outlook.com', 'mr_white', 'star')
              ");
            $statement -> execute();
            $statement = null;

        }

        if(array_key_exists('reset',$_POST)) {
            cleanDB();
        }
    ?>
    </section>
    <section>
      <h2>Check if a Value Exists in a Table's Attribute</h2>
      <p><code>function valueExistsInAttribute($value, $attribute, $table)</code></p>
      <hr>
      <form action="/assignment-3--databases--cs-365--fall-2023/index.php" method="POST">
        <label for="value1">Value:</label><br>
        <input type="text" id="value1" name="value1"><br>
        <label for="attribute1">Attribute:</label><br>
        <input type="text" id="attribute1" name="attribute1"><br>
        <lable for="table1">Table:</label><br>
        <input type="text" id="table1" name="table1"><br>
        <input type="submit" name='submit1' value="Submit1">
      </form>
        <?php
            if(isset($_POST['submit1'])){
                if(valueExistsInAttribute($_POST["value1"],  $_POST["attribute1"],  $_POST["table1"])) {
                    echo "True";
                } else {
                    echo "False";
                }
            }
        ?>
      </p>
    </section>
    <section>
      <h2>Retrieve all Attribute Values in a Table</h2>
      <p><code>function getAttributeFromTable($attribute, $table)</code></p>
      <hr>
      <form action="/assignment-3--databases--cs-365--fall-2023/index.php" method="POST">
        <label for="attribute2">Attribute:</label><br>
        <input type="text" id="attribute2" name="attribute2"><br>
        <lable for="table2">Table:</label><br>
        <input type="text" id="table2" name="table2"><br>
        <input type="submit" name='submit2' value="Submit2">
      </form>
      <ul>
        <?php
            if(isset($_POST['submit2'])){
                printAttributesFromTable($_POST["attribute2"], $_POST["table2"]);
            }
        ?>
      </ul>
    </section>
    <section>
      <h2>Update an Attribute</h2>
      <p><code>function updateAttribute($table, $current_attribute, $new_attribute, $query_attribute, $pattern)</code></p>
      <hr>
      <form action="/assignment-3--databases--cs-365--fall-2023/index.php" method="POST">
        <lable for="table4">Table:</label><br>
        <input type="text" id="table4" name="table4"><br>
        <label for="attribute3">Current Attribute:</label><br>
        <input type="text" id="attribute3" name="attribute3"><br>
        <label for="attribute4">New Attribute:</label><br>
        <input type="text" id="attribute4" name="attribute4"><br>
        <label for="attribute5">Query Attribute:</label><br>
        <input type="text" id="attribute5" name="attribute5"><br>
        <label for="pattern2">Pattern:</label><br>
        <input type="text" id="pattern2" name="pattern2"><br>
        <input type="submit" name='submit4' value="Submit4">
      </form>
        <?php
            if(isset($_POST['submit4'])){
                updateAttribute($_POST["table4"], $_POST["attribute3"], $_POST["attribute4"], $_POST["attribute5"], $_POST["pattern2"]);
            }
        ?>
      </p>
      <ul>
        <?php
            if(isset($_POST['submit4'])){
                getAttributeFromTable($_POST["attribute3"], $_POST["table4"]);
            }
        ?>
      </ul>
    </section>
    <section>
      <h2>Delete an Attribute</h2>
      <p><code>function delete($table, $attribute, $query)</code></p>
      <hr>
      <form action="/assignment-3--databases--cs-365--fall-2023/index.php" method="POST">
        <lable for="table5">Table:</label><br>
        <input type="text" id="table5" name="table5"><br>
        <label for="attribute6">Attribute:</label><br>
        <input type="text" id="attribute6" name="attribute6"><br>
        <label for="pattern3">Pattern:</label><br>
        <input type="text" id="pattern3" name="pattern3"><br>
        <input type="submit" name="submit5" value="Submit5">
      </form>
        <?php
            if(isset($_POST["submit5"])){
                delete($_POST["table5"], $_POST["attribute6"], $_POST["pattern3"]);
            }
        ?>
      </p>
      <ul>
        <?php
            if(isset($_POST['submit5'])){
                getAttributeFromTable($_POST["attribute6"], $_POST["table5"]);
            }
        ?>
      </ul>
    </section>
    <section>
      <h2>Insert a Row</h2>
      <p><code>function create($table1, $web_domain, $web_name, $table2, $username, $email, $p_word, $comment)</code></p>
      <hr>
      <form action="/assignment-3--databases--cs-365--fall-2023/index.php" method="POST">
        <lable for="table6">Table:</label><br>
        <input type="text" id="table6" name="table6"><br>
        <label for="attribute7">Attribute:</label><br>
        <input type="text" id="attribute7" name="attribute7"><br>
        <label for="attribute8">Attribute:</label><br>
        <input type="text" id="attribute8" name="attribute8"><br>
        <lable for="table7">Table:</label><br>
        <input type="text" id="table7" name="table7"><br>
        <label for="attribute9">Attribute:</label><br>
        <input type="text" id="attribute9" name="attribute9"><br>
        <label for="attribute10">Attribute:</label><br>
        <input type="text" id="attribute10" name="attribute10"><br>
        <label for="attribute11">Attribute:</label><br>
        <input type="text" id="attribute11" name="attribute11"><br>
        <label for="attribute12">Attribute:</label><br>
        <textarea id="attribute12" name="attribute12" rows="5" cols="33"></textarea><br>
        <input type="submit" name="submit6" value="Submit6">
      </form>
        <?php
            if(isset($_POST["submit6"])){
                create($_POST["table6"], $_POST["attribute7"], $_POST["attribute8"], $_POST["table7"], $_POST["attribute9"], $_POST["attribute10"], $_POST["attribute11"], $_POST["attribute12"]);
            }
        ?>
      </p>
    </section>
  </main>
</body>
</html>
