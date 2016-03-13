<?php
$mtime = microtime();
$uid = uniqid($mtime, 1);
$md = md5($uid);
print("md = " . $md . "<br>");
print("mtime = " . $mtime . "<br>");
print("uid = " . $uid . "<br>");
for ($i = 0; $i < 100; $i++) {
	print(md5(uniqid(microtime(), 1)) . "<br>");
}
?>
