
<?php
if (isset($_FILES['myFile'])) {
    
    move_uploaded_file($_FILES['myFile']['image'], "uploads/" . $_FILES['myFile']['name']);
    echo 'successful';
}
?>