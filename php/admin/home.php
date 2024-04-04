<?php
include("navbar.php");
?>

<head>
    <title>Databases</title>
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
        <button>Display</button>
    </form>

    <table class="table table-striped table-hover">
        <tr>
            <?php foreach ($_SESSION['tableColumns'] as $column) :?>
                    <th><?php echo $column ?></th>
            <?php endforeach?>
        </tr>
        <?php foreach ($_SESSION['tableData'] as $row): ?>
            <tr>
                <?php foreach ($row as $cell) : ?>
                    <td><?php echo $cell?></td>
                <?php endforeach?>
            </tr>
        <?php endforeach;?>
    </table>
</main>