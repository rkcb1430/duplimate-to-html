<?php

require "dlmreader.php";

$hasSent = isset($_POST['submit']);


if (!$hasSent) {
?>    
<html>
<body>
<form action="dlm.php" method="post" enctype="multipart/form-data">
<div>Choose a DLM file for processing (or leave empty to see boards from 1.dlm):
<input type="file" name="dlmfile" />
<input type="submit" name="submit" value="Send" />
</div>
</form>
</body>
</html>    
<?php    
die();
}
$file = $_FILES["dlmfile"]["tmp_name"];
if (isset($file) && strlen($file) > 1)  {
    $f = fopen($file, "r");
} else {
    $f = fopen("1.dlm", "r");
}

$reader = new DlmReader();
$boards = $reader->readBoardsFromFile($f);

echo "<p>Boards to use: " . $boards->firstBoard . " - " . $boards->lastBoard . "</p>\n";

foreach ($boards->boards as $bn => $b) {
    if ($b->no == 1+ $boards->lastBoard) {
        echo "<hr />\n<p>Boards below this line are not in use as per the DLM file.</p>\n";
    }
    echo $b->printout();
    if ($b->no +1 == $boards->firstBoard) {
        echo "<p>Boards above this line are not in use as per the DLM file.</p><hr />\n\n";
    }
}

?>