<?php include 'core/queries.php';
//include 'core/conn.php';

/* Call function in queries.php to delete the specified listing by it's id */

echo 'My id';
if ($_SESSION['id'] == $user_id) {
    
    $get_picture = $conn->query("SELECT image FROM listing WHERE id=" . $_GET['id']);
    if ($get_picture->num_rows > 0) {
        echo 'hereer';
        while ($row = $get_picture->fetch_assoc()) {
            echo $row['image'];
            echo ':(';
        }
    }
}

//if (deleteListing($_GET['id'], $_GET['user']) ) { 


    

    // if ($_SESSION['id'] == $user_id) {
    //     $get_picture = $conn->query("SELECT image FROM listing WHERE id=" . $id);
    //     if ($get_picture->num_rows > 0) {
    //         while ($row = $get_picture->fetch_assoc()) {
    //             $image = $row['image'];
    //             echo $image;
    //             //unlink('../' . $image);
    //         }
    //     }

    //     if ($conn->query("DELETE FROM listing WHERE id=" . $id)) {
            
    //         echo 'Deleted';

    //         return true;
    //     }
    // }


    //header("Location: profile.php"); 
// } else {
//     echo 'There has been an error';
// }