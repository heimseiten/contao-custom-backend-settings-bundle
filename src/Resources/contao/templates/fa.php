<?php 

    // icon folder must be public
    // Example: {{file::fa.php?light=clock}}
    
    if (isset($_GET['brands'])) {
        echo '<i class="fa">'.file_get_contents("files/layout/icons/fontawesome/svgs/brands/".$_GET['brands'].".svg").'</i>'; 
    }
    if (isset($_GET['duotone']) != '') {
        echo '<i class="fa">'.file_get_contents("files/layout/icons/fontawesome/svgs/duotone/".$_GET['duotone'].".svg").'</i>'; 
    }
    if (isset($_GET['light']) != '') {
        echo '<i class="fa">'.file_get_contents("files/layout/icons/fontawesome/svgs/light/".$_GET['light'].".svg").'</i>'; 
    }
    if (isset($_GET['regular']) != '') {
        echo '<i class="fa">'.file_get_contents("files/layout/icons/fontawesome/svgs/regular/".$_GET['regular'].".svg").'</i>'; 
    }
    if (isset($_GET['solid']) != '') {
        echo '<i class="fa">'.file_get_contents("files/layout/icons/fontawesome/svgs/solid/".$_GET['solid'].".svg").'</i>'; 
    }
    if (isset($_GET['thin']) != '') {
        echo '<i class="fa">'.file_get_contents("files/layout/icons/fontawesome/svgs/thin/".$_GET['thin'].".svg").'</i>';
    }
    if (isset($_GET['sharp-light']) != '') {
        echo '<i class="fa">'.file_get_contents("files/layout/icons/fontawesome/svgs/sharp-light/".$_GET['sharp-light'].".svg").'</i>'; 
    }
    if (isset($_GET['sharp-regular']) != '') {
        echo '<i class="fa">'.file_get_contents("files/layout/icons/fontawesome/svgs/sharp-regular/".$_GET['sharp-regular'].".svg").'</i>'; 
    }
    if (isset($_GET['sharp-solid']) != '') {
        echo '<i class="fa">'.file_get_contents("files/layout/icons/fontawesome/svgs/sharp-solid/".$_GET['sharp-solid'].".svg").'</i>'; 
    }
    
?>