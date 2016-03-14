<?php
require("RSAfuncs.php");
set_time_limit(0);

mt_srand((double)microtime()*10000);
/*
* Test Code.
*/
if(isset($_REQUEST['keys']) && $_REQUEST['keys']>0){
    $loop=$_REQUEST['keys'];
}else{
    $loop=10;
}
if(isset($_REQUEST['bits']) && $_REQUEST['bits']>=64){
    $size=$_REQUEST['bits'];
}else{
    $size=128;
}
if($_REQUEST['method']==2){
    $method=2;
}else{
    $method=1;
}

$msg=array(
'A nice block of blahs:  blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah  blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah  blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blahblah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah  blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah  blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah  blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah  blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah  blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah  blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blahOhhhh wasnt that fun!.',
'another long text block this time of ASCII arses:
  ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | )
  ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o )
  ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | )
  ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o )
  ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | )
  ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o )
  ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | )
  ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o )
  ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | )
  ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o )
  ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | )
  ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o )
  ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | )
  ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o )
  ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | )
  ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o )
  ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | )
  ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o )
done.
',
'h dsfhg skdhg khg kshdf kshgk sjskdhgkshdgk ghk )("*)(^$!%_!£($^!$^!(£^$_!£*^%_!£^%_(*£!^%)*&£!^$_(*£^$!&£^$()!£*^$(&£!^%_(!*£%^(!*£{}PR~@:MER~FM@LRM~EWRLM:LASM:L~D:L~@@~;#\'l#\'wel#l#sgL#\';#\'llt#rt;lrk\';lskggp[p[tiuygdsgkjhskjhrgkshrghs hgkj hfdskjg hreishgogh hgs kjhg slkhgseoiurhg;shg kjflhg kjshg slyrtoishtglskhkjfhgkhfgkjsdfh gskfhgkslfhg seihgslkhgskljhgslkdfhg sldriuhytluieshrfmnvbsv vb easkrhg shgesgf lksjhg surhg lkshg gbsjfdgbskdfjgb ksldfhgurgytoiuweytsjhglksjfgnskjn sjnfg skjhg gheiurorwirytoiweytoiweytoihks hgkhg ksksfh gsfhg kshfg klsfhg shg lsdhg skdhg slkdhg skhghsdfghkgnhgf kshg kshgeirueowihgkdshg shf dgksdh gklhsdfkhg ksfdhg shgklshfkhreoiughpgsnogsrogsr gsor ghhghgsklh gksh g 39845094235073509(*(!%£^%"("%^"$%("*%("%(*^"%£^$ &RGYEGU ugfgw8629836*^*^*^"*^(*^"*(^"*(^"',
'another long text block this time of ASCII arses:
  ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | )
  ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o )
  ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | )
  ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o )
  ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | )
  ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o )
  ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | )
  ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o )
  ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | )
  ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o )
  ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | )
  ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o )
  ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | )
  ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o )
  ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | )
  ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o )
  ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | ) ( | )
  ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o ) ( o )
done.
',
')!£^£)&^£*&^)(!"^^%"*"!}{~@:~:?><?><¬¬¬~@:~@:#;#;[p]./,/,',
'2',
'hmmmm nice!!!',
'yeah baby',
'183013701273091720371031'
);
for($i=0; $i<1000; $i++){
    $msg[10].=chr(mt_rand()%255);
}
$failed=0;
$passed=0;
printf('
<html>
<head>
<title>RSA Test</title>
</head>
<body>
<b>%dBit RSA Test.</b>
<br>Generating %d keys and encrypting %d messages with each key.
<br>To view the keys place your mouse pointer over the required block.
<br>Message array :
<p><tt><font size="1">
%s
<p>
', $size, $loop, count($msg), nl2br(htmlentities(var_export($msg, true))));
flush();
list($usec, $sec) = explode(" ",microtime()); 
$startTime=((float)$usec + (float)$sec);
for($i=0;$i<$loop;$i++){
    if($i%10==0){
        printf('<br>%06d ', $i);
    }
    $keyFailed=False;
    print('[');
    flush();
    if($method==1){
        list($n, $e, $d)=gen_RSA_keys($size);
    }else{
        list($n, $e, $d)=gen_RSA_keys2($size);
    }
    printf('<acronym title="
    n: %s
    e: %s
    d: %s
    ">', (string)$n, (string)$e, (string)$d);
    flush();
    foreach($msg as $m){
        $enc=RSA_Encrypt((string)$e, (string)$n, $m);
        $dec=RSA_Decrypt((string)$d, (string)$n, $enc);
        if($dec!=$m){
            print('x');
            $keyFailed=True;
        }else{
            print('.');
        }
        flush();
        unset($enc, $dec);
    }
    print('</acronym>] ');
    flush();
    if($keyFailed==True){
        $failed++;
    }else{
        $passed++;
    }
    unset(
    $n,
    $e,
    $d,
    $m
    );
}
list($usec, $sec) = explode(" ",microtime()); 
$endTime=((float)$usec + (float)$sec);
printf('
</font></tt>
<p><b>%d</b> keys passed.
<br><b>%d</b> keys failed.
<br>Time: %.3fs.
</body>
</html>
', $passed, $failed, $endTime-$startTime);
?>
