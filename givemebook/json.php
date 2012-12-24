<?php
$groups = array("biology", "economist", "programmers");
?>

<input type="text" class="span1" id="tag_field" data-items='4' data-provide="typeahead" data-source='<?php echo json_encode($groups); ?>'>