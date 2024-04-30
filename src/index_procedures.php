<?php
function executeProcedure($procedureName) {
    $query = oci_parse(database(), "BEGIN $procedureName(); END;");
    oci_execute($query);

    $output = oci_parse(database(), 'BEGIN DBMS_OUTPUT.GET_LINE(:line, :status); END;');
    oci_bind_by_name($output, ':line', $line, 32767);
    oci_bind_by_name($output, ':status', $status);

    $count = 1;

    echo '<div style="display: flex; justify-content: center; width: 75%; transform: translateX(17%);">';
    while ($status == 0) {
        oci_execute($output);
        $data = explode(', ', $line);
        if (isset($data[1]) && isset($data[2]) && isset($data[3])) {
            echo '<div style="width: 150px; margin: 0 auto; text-align: center;">';
            echo '<a href="adatlap.php?book_id=' . urlencode(explode(": ", $data[0])[1]) . '">';
            echo '<img id="borito" src="assets/imgs/istockphoto-1132160175-612x612-removebg-preview.png" alt="Borítókép" style="z-index: 1; margin: 0;">';
            echo '</a>';
            echo '<h2 style="font-size: 50px; margin-top: 10px; margin-bottom: 0; position: relative; bottom: 180px; left: -50px; color: #59503f;">' . $count . '</h2>';
            echo '<a style="height: 60px; display: block; margin-bottom: 5px;" href="adatlap.php?book_id=' . urlencode(explode(': ', $data[0])[1]) . '">';
            echo explode(': ', $data[1])[1];
            echo '</a>';
            echo '<p style="height: 20px; margin-bottom: 5px;">' . explode(': ', $data[3])[1] . '</p>';
            echo '<p style="height: 5px; margin-bottom: 5px;">_________________</p>';
            echo '<p>' . explode(': ', $data[2])[1] . ' Ft</p>';
            echo '<form method="post" action="kosar.php">';
            echo '<input type="hidden" name="book_title" value="' . explode(': ', $data[1])[1] . '">';
            echo '<input type="hidden" name="book_price" value="' . explode(': ', $data[2])[1] . '">';
            echo '<input class="continueButton" type="submit" value="Kosárba">';
            echo '</form>';
            echo '</div>';

            $count++;
        }
    }
    echo '</div>';

    oci_free_statement($output);
}

$enable = oci_parse(database(), 'BEGIN DBMS_OUTPUT.ENABLE(NULL); END;');
oci_execute($enable);

oci_close(database());
