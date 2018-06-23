<?php

include_once 'db_config.php';

$result = mysqli_query($con,"SELECT `domain`,`matchedto`,`notes` FROM domains");
$i=1;
while ($row = mysqli_fetch_array($result)) {
  if ($row['ratio'] >= '95') {
    echo '<tr class="table-danger" id="' . $i . '">';
    echo '<td>' . $row['domain'] . '</td>';
    echo '<td>' . $row['matchedto'] . '</td>';
    echo '<td>' . $row['notes'] . '</td>';
    echo '<td><button type="button" class="btn btn-danger del_domain" domain="' . $row['domain'] .  '">Remove</button>
    <button type="button" class="btn btn-primary update_domain" domain="' . $row['domain'] .  '" matchedto="' . $row['matchedto'] .  '">Keep</button>
    <input type="checkbox" name="domain[]" value="' . $row['domain'] . '"></td>';
    $i++;
  }
  else {
    echo '<tr id="' . $i . '">';
    echo '<td>' . $row['domain'] . '</td>';
    echo '<td>' . $row['matchedto'] . '</td>';
    echo '<td>' . $row['notes'] . '</td>';
    echo '<td><button type="button" class="btn btn-danger del_domain" domain="' . $row['domain'] .  '">Remove</button>
    <button type="button" class="btn btn-primary update_domain" domain="' . $row['domain'] .  '" matchedto="' . $row['matchedto'] .  '">Keep</button>
    <input type="checkbox" name="domain[]" value="' . $row['domain'] . '"></td>';
    $i++;
  }
}
mysqli_close($con);

?>