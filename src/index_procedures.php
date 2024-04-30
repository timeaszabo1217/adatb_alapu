<?php
function executeProcedure($procedureName) {
    $query = oci_parse(database(), "BEGIN $procedureName(); END;");
    oci_execute($query);

    $output = oci_parse(database(), 'BEGIN DBMS_OUTPUT.GET_LINE(:line, :status); END;');
    oci_bind_by_name($output, ':line', $line, 32767);
    oci_bind_by_name($output, ':status', $status);
    echo '<div style="display: flex">';
    while ($status == 0) {
        oci_execute($output);
        $data = explode(', ', $line);
        if (isset($data[1]) && isset($data[2]) && isset($data[3])) {
            echo '<div style="width: 150px; margin: 0 auto; text-align: center;">';
            echo '<img id="borito" src="assets/imgs/istockphoto-1132160175-612x612-removebg-preview.png" alt="Borítókép">';
            echo '<p style="height: 40px">' . explode(': ', $data[1])[1] . '</p>';
            echo '<p style="height: 20px">' . explode(': ', $data[3])[1] . '</p>';
            echo '<p style="height: 5px">_________________</p>';
            echo '<p>' . explode(': ', $data[2])[1] . ' Ft</p>';
            echo '<form method="post" action="kosar.php">';
            echo '<input type="hidden" name="book_title" value="' . explode(': ', $data[1])[1] . '">';
            echo '<input type="hidden" name="book_price" value="' . explode(': ', $data[2])[1] . '">';
            echo '<input class="continueButton" type="submit" value="Kosárba">';
            echo '</form>';
            echo '</div>';
        }
    }
    echo '</div>';

    oci_free_statement($output);
}

$enable = oci_parse(database(), 'BEGIN DBMS_OUTPUT.ENABLE(NULL); END;');
oci_execute($enable);

oci_close(database());
?>
