<?php
include("navbar.php");
?>
<head>
    <link rel="stylesheet" href="../../css/desktop/admin/home.css">
</head>
<main>
    <h2>Databases</h2>
    <form action="../../controller/admin/getTableData.php" method="post">
        <select name="selectedTable">
            <option selected disabled>Choose Table</option>
            <?php
            foreach ($tables as $table) {
                echo "
                <option value='$table->Tables_in_alvin'>$table->Tables_in_alvin</option>
                ";
            }
            ?>
        </select>
        <button>Click Me</button>
    </form>

    <table border="1">
        <tr>
            <?php
                foreach ($_SESSION['tableColumns'] as $column) {
                    echo "
                    <th>$column</th>
                    ";
                }            
            ?>
        </tr>
        <?php
            foreach ($_SESSION['tableData'] as $row) {
                ?>
                <tr>
                <?php
                foreach ($row as $cell) {
                    echo "
                    <td>$cell</td>
                    ";
                }
                ?>
                </tr>
                <?php
            }        
        ?>
    </table>
</main>