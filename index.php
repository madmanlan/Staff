
<?php
    if (isset($_POST['submit'])) {
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName  = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type'];
    $fileError = $_FILES['file']['error'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end(fileExt));

    $allowed = array (jpg', 'png', 'jpeg', 'pdf'); 

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError == 0) { 
            if ($fileSize < 1000000) { 
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination = 'upload/'.$fileNameNew,
                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location: index.php?uploadsuccess");
            } else { 
                echo "Your file is too big!";
            }    
        } else { 
                echo "There was a error!";
        }    
    } else { 
                echo "File type Problem!";
    }    
}
            
                 
