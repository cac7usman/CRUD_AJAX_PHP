<?php
$_cmd = $_POST['cmd'];
$res  = "";
if (isset($_POST['_id'])) $_id = $_POST['_id'];
if (isset($_POST['_fname'])) $_fname = $_POST['_fname'];
if (isset($_POST['_lname'])) $_lname = $_POST['_lname'];
if (isset($_POST['_age'])) $_age = $_POST['_age'];



switch ($_cmd)
{
    case "C"  : _create(); break;
    case "R"  : _retrieve(); break;
    case "U"  : _update(); break;
    case "D"  : _delete(); break;
}


echo $res;


function _create($_id, $_fname, $_lname, $_age)
{

        $_id = $_POST['_id'];

        $_fname = $_POST['_fname'];
        $_lname = $_POST['_lname'];
        $_age = $_POST['_age'];

        $sql = "INSERT INTO PERSON (id, fname, lname, age) VALUES ('$_id', '$_fname', '$_lname', '$_age')";
        $conn = new mysqli("localhost", "root", "", "test");
        $result = $conn->query($sql);
        $conn->close();
}

function _retrieve()
{
    global $res;

    $conn = new mysqli("localhost", "root", "", "test");
    $sql = "SELECT * from Person";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {



            $res .= "<tr><td>" . $row["ID"] . "</td><td>" . $row["FNAME"] . "</td><td>" . $row["LNAME"] . "</td><td>" . $row['AGE'] . "</td></tr>";
        }
    }
    $conn->close();

}

 function _update($_id, $_fname, $_lname, $_age)
{
 $_id = $_POST['_id'];
 $_fname = $_POST['_fname'];
 $_lname = $_POST['_lname'];
 $_age = $_POST['_age'];

 $sql = "UPDATE person SET fname='$_fname',lname='$_lname',age='$_age' WHERE id=".$_id;
 $conn = new mysqli("localhost", "root", "", "test");
 $result = $conn->query($sql);
 $conn->close();
}


function _delete($_id)
{
    $_id = $_POST['_id'];
    $sql = "DELETE FROM PERSON WHERE id =".$_id;
    $conn = new mysqli("localhost", "root", "", "test");
    $result = $conn->query($sql);
    $conn->close();
}
 

?>








