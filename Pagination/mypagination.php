<link rel="stylesheet" href="public/css/zebra_pagination.css" type="text/css">
<script type="text/javascript" src="public/javascript/zebra_pagination.js"></script>
<?php
// let's paginate data from an array...
mysql_connect("localhost","root","root");
mysql_select_db("sinfra");
// how many records should be displayed on a page?
$records_per_page = 10;

// include the pagination class
require 'Zebra_Pagination.php';

// instantiate the pagination object
$pagination = new Zebra_Pagination();

$MySQL = '
    SELECT
        SQL_CALC_FOUND_ROWS
        *
    FROM
        requisitions
    LIMIT
        ' . (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page . '
';

// if query could not be executed
if (!($result = @mysql_query($MySQL))) {

    // stop execution and display error message
    die(mysql_error());

}

// fetch the total number of records in the table
$rows = mysql_fetch_assoc(mysql_query('SELECT FOUND_ROWS() AS rows'));

// pass the total number of records to the pagination class
$pagination->records($rows['rows']);

// records per page
$pagination->records_per_page($records_per_page);

?>

<table class="countries" border="1">

    <tr><th>Country</th></tr>

    <?php $index = 0?>

    <?php while ($row = mysql_fetch_assoc($result)):?>

    <tr<?php echo $index++ % 2 ? ' class="even"' : ''?>>
        <td><?php echo $row['id']?></td>
    </tr>

    <?php endwhile?>

</table>

<?php

// render the pagination links
$pagination->render();

?>
