<?php

$memc = new Memcache;
$memc->addServer('localhost','11211');
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Simple Memcache Lookup</title>
</head>
<body>
<form method="post">
  <p><b>Film</b>: <input type="text" size="20" name="film"></p>
<input type="submit">
</form>
<hr/>

<?php

  echo "Loading data...\n";

$value = $memc->get($_REQUEST['film']);

if ($value)
  {
    printf("<p>Film data for %s loaded from memcache</p>",$value['title']);

    foreach (array_keys($value) as $key)
      { 
	printf("<p><b>%s</b>: %s</p>",$key, $value[$key]);
      } 
  }
 else
   {
     $con = new mysqli('localhost','sakila','password','sakila') or
       die ("<h1>Database problem</h1>" . mysqli_connect_error());

     $result = $con->query(sprintf('select * from film where title ="%s"',$_REQUEST['film']));

     $row = $result->fetch_array(MYSQLI_ASSOC);

     $memc->set($row['title'],$row);

     printf("<p>Loaded %s from MySQL</p>",$row['title']);
   }

?>