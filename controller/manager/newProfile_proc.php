<?php
// error_reporting(E_ALL);
// ini_set("display_errors" , 1);

include('../../model/manager/class.php');

$managersInput = (object)$_POST;
$managerClassObj = new managerClass;
try {
    $managerClassObj->add($managersInput);
    header('Location: ../../php/manager/home.php');
    ?>
        <script>
            alert('Record Added Successfully')
        </script>
    <?php
}
catch (Exception $e) {
    die ('Failed to continue'. $e->getMessage());
}
?>