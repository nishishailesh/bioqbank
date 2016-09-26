<?php
session_start();

echo '<html>';
echo '<head>';
echo '</head>';
echo '<body>';

echo '
<form method=post action=bio_qbank.php>
<table>
<tr>
<td>Login Name</td>
<td><input type=text name=login placeholder=Username></td>
</tr>
<tr>
<td>Password</td>
<td><input type=password name=password  placeholder=Password></td>
</tr>
<tr>
<td><input type=submit name=action value=Login></td>
</tr>
</table>
</form> ';

echo '</body></html>';

?>
