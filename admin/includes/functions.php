<?php

function addCategories(){
    global $connect;

if(isset($_POST['submit_add'])){

$cat_title = $_POST['cat_title'];

if($cat_title == "" || empty($cat_title)) {

    echo "This Field should not be empty";

} else {
        $add_query = "INSERT INTO categories (cat_name) VALUES('$cat_title')";
        //echo "<h1 style='color: #9d9d9d'>$add_query</h1>";
        $result = mysqli_query($connect,$add_query);

        if(!$result){
            die("Query not worked" . mysqli_error($connect));
        }
        }
    }

}

function deleteCategories(){
    global $connect;
    if(isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $delete_query = "DELETE FROM categories WHERE cat_id = $delete_id";
        $result = mysqli_query($connect, $delete_query);
        header('Location: category.php');
        if (!$result) {
            die("QUERY did not work " . mysqli_error($connect));
        }
    }

}
function confirm_query($result){
    global $connect;
    if(!$result){
        die("Query ERROR " . mysqli_error($connect));
    }
}
function loadAllCategoriesToTable(){
    global $connect;
    $query = "SELECT * FROM categories";
    $query_category_result = mysqli_query($connect,$query);
    while($row = mysqli_fetch_assoc($query_category_result)){
        $cat_title = $row['cat_name'];
        $cat_id = $row['cat_id'];
        echo "<tr>";
        echo "<td class='text-danger'>{$cat_id}</td>";
        echo "<td class = 'text-primary'>{$cat_title}</td>";
        echo "<td><a class = 'btn btn-primary' href = 'categories.php?edit=$cat_id'>Edit</a></td>";
        ?>

        <td><a onclick="return confirm('Are you sure about deleting this Item?');" class = 'btn btn-danger' href = 'categories.php?delete=<?php echo $cat_id;?>'>Delete</a></td>
        <?php
        echo "</tr>";
    }
}
function escape($string){
    global $connect;
    return mysqli_real_escape_string($connect,$string);
}






?>
