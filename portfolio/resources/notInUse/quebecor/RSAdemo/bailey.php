<?php
/*
* PHP RSA Code.
*     By William Bailey.
*        wb@pro-net.co.uk
*
* Please send any bug fixes/comments/questions to the address above.
* You can use the following code in any way you like. But what would
* be nice is a mention on the project credits and/or an email telling
* me that you have used my code.
*
*/

/*  
	from original code...moved to bailey_test.php
*/
set_time_limit(0);

mt_srand((double)microtime()*10000);
/*
*/

function generate_prime ($bits) {
    $number=gmp_init('0');
    for($i=$bits; $i>=0; $i--){
        $rand=mt_rand()%2;
        gmp_setbit($number, $i, $rand);
    }
    $odd=gmp_mod($number, 2);
    if((string)strval($odd)=='0'){
        $number=gmp_add($number, 1);
    }
    while(gmp_prob_prime($number)<1){
        $number=gmp_add($number, 2);
    }
    if(strlen(gmp_strval($number, 2))!=$bits){
        $number=generate_prime($bits);
    }else{
        return (string)gmp_strval($number);
    }
}

function gen_RSA_keys ($bits=512, $e=17) {
    /*
     * $bits us the length desired for $n
     *   ($p and $q will be half as long)
     *   ($e, $n) is the public key
     *   ($d, $n) id the private key
     *
     * It seems that sometimes php forgets the resource id
     * for p and q therefore i have added the while(empty())
     * condition to this script so that if php forgets the
     * resource id it will just loop and try agian.
     *
     * This might be because im running the cvs version of
     * php. :)
     *
     * Hopefull this will be resolved soon and should make
     * this code fastar as it will not have to generate
     * waisted prome numbers.
     */
    $e=gmp_init((string)$e);
    $p=Null;
    while(empty($p)){
        do {
            $p=gmp_init((string)generate_prime($bits/2));
            $t=gmp_sub($p, 1);
        } while (gmp_gcd($t, $e)==1);
    }
    $q=Null;
    while(empty($q)){
        do {
            $q=gmp_init((string)generate_prime($bits/2));
            $t=gmp_sub($q, 1);
        } while (gmp_gcd($t, $e)==1);
    }
    $n=gmp_mul($p, $q);
    $t=gmp_add(gmp_sub(gmp_sub($n, $p), $q), 1);
    $d=mod_inverse((string)gmp_strval($e), (string)gmp_strval($t));
    if(gmp_strval($d)=='1'){
        return gen_RSA_keys ($bits, gmp_strval($e));
    }else{
        return(array((string)gmp_strval($n, 16), (string)gmp_strval($e, 16), (string)gmp_strval($d, 16)));
    }
}


function gen_RSA_keys2 ($bits=512) {
    /*
     * $bits us the length desired for $n
     *   ($p and $q will be half as long)
     *   ($e, $n) is the public key
     *   ($d, $n) id the provate key
     *
     */
    $p=Null;
    while(empty($p) || gmp_prob_prime($p)<1){
        $p=gmp_init((string)generate_prime($bits/2));
    }
    $q=Null;
    while(empty($q) || gmp_prob_prime($q)<1){
        $q=gmp_init((string)generate_prime($bits/2));
    }
    $n=gmp_mul($p, $q);
    $t=gmp_add(gmp_sub(gmp_sub($n, $p), $q), 1);
    $e=find_e($q, $q);
    $d=mod_inverse((string)gmp_strval($e), (string)gmp_strval($t));
    if(gmp_strval($d)=='1'){
        return gen_RSA_keys2 ($bits, gmp_strval($e));
    }else{
        return(array((string)gmp_strval($n, 16), (string)gmp_strval($e, 16), (string)gmp_strval($d, 16)));
    }
}

function find_e($p, $q) { 
    $great=gmp_init(0); 
    $e=gmp_init(2); 
    $t=gmp_mul(gmp_sub($p, 1), gmp_sub($q, 1)); 
    while(gmp_strval($great)!='1'){ 
        $e=gmp_add($e, 1);
        while(gmp_prob_prime($e)<1){
            $e=gmp_add($e, 1);
        } 
        $great=gmp_gcd($e,$t); 
    } 
    return $e; 
}

function mod_inverse ($e, $t) {

    $e=gmp_init((string)$e);
    $t=gmp_init((string)$t);

    $u1 = gmp_init(1); 
    $u2 = gmp_init(0); 
    $u3 = $t; 
    $v1 = gmp_init(0); 
    $v2 = gmp_init(1); 
    $v3 = $e; 

    while(gmp_cmp($v3, 0)!=0){
        $q=gmp_div($u3,$v3);
        $t1=gmp_sub($u1,gmp_mul($q, $v1));
        $t2=gmp_sub($u2,gmp_mul($q, $v2));
        $t3=gmp_sub($u3,gmp_mul($q, $v3));

        $u1=$v1;
        $u2=$v2;
        $u3=$v3;

        $v1=$t1;
        $v2=$t2;
        $v3=$t3;
    }
    $uu=$u1;
    $vv=$u2;
    if(gmp_cmp($vv, 0)<0){
        return (string)gmp_strval(gmp_add($vv, $t));
    }else{
        return (string)gmp_strval($vv);
    }
}

function powMod($n, $ed, $m) { 
    $ed=gmp_init(sprintf('0x%s',(string)$ed));
    $n=gmp_init(sprintf('0x%s',(string)$n));
    $m=gmp_init(sprintf('0x%s',(string)$m));

    if (gmp_cmp($n, 0)==0 || gmp_cmp($ed, 0)<0) {
        return False; 
    } 
    $res=gmp_init(1); 
    $pow=$m; 
    $ed1=$ed; 
    while(gmp_cmp($ed1, 0)!=0){ 
        $d=gmp_mod($ed1, 2); 
        $ed1=gmp_div($ed1, 2); 
        if(gmp_cmp($d, 1)==0){ 
            $res=gmp_mod(gmp_mul($res, $pow), $n); 
        } 
        $pow=gmp_mod(gmp_mul($pow, $pow), $n); 
    } 
    if(gmp_cmp($res, 0)<0){ 
        $res=gmp_add($res, $n); 
    } 
    return (string)gmp_strval($res, 16); 
}

function hex2bin($data) { 
    return pack("H*" , $data); 
}

function RSA_Encrypt ($ed, $n, $message) {
    /*
     * Looks like the encryption fucks up with when there is a
     * new line chr.
     */
    $ed=gmp_init(sprintf('0x%s',(string)$ed));
    $n=gmp_init(sprintf('0x%s',(string)$n));

    $i=0;
    $encBlockArray=array();
    $block='';
    while($i<strlen($message)){
        $nextBlockNumber=gmp_init(0);
        $block='';
        do{
            $block.=$message{$i};
            $nextBlockNumber=gmp_init(sprintf('0x%s', bin2hex(sprintf('%s%s', $block, $message{$i+1}))));
            $i++;
        }while(gmp_cmp($nextBlockNumber, $n)<0 && $i<strlen($message));
        $encBlockArray[]=(string)RSA_Encrypt_Block((string)gmp_strval($ed, 16), (string)gmp_strval($n, 16), $block);
    };
    return $encBlockArray;
}

function RSA_Decrypt ($ed, $n, $encBlockArray) {
    $message='';
    foreach($encBlockArray as $encBlock){
        $message.=(string)RSA_Decrypt_Block($ed, $n, $encBlock);
    }
    return $message;
}

function RSA_Encrypt_Block ($ed, $n, $block) {
    $ed=gmp_init(sprintf('0x%s',(string)$ed));
    $n=gmp_init(sprintf('0x%s',(string)$n));
    $blockNumber=gmp_init(sprintf('0x%s', bin2hex((string)$block)));
    if(gmp_cmp($blockNumber, $n)<0){
        $encBlock=gmp_init(sprintf('0x%s',(string)powMod((string)gmp_strval($n, 16), (string)gmp_strval($ed, 16), (string)gmp_strval($blockNumber, 16))));
        return (string)gmp_strval($encBlock, 16);
    }else{
        print('Enc block too big');
        flush();
        return False;
    }
}
function RSA_Decrypt_Block ($ed, $n, $encBlock) {
    $ed=gmp_init(sprintf('0x%s',(string)$ed));
    $n=gmp_init(sprintf('0x%s',(string)$n));
    $blockNumber=gmp_init(sprintf('0x%s', (string)$encBlock));
    if(gmp_cmp($blockNumber, $n)<0){
        $block=gmp_init(sprintf('0x%s',(string)powMod((string)gmp_strval($n, 16), (string)gmp_strval($ed, 16), (string)gmp_strval($blockNumber, 16))));
        return (string)hex2bin((string)gmp_strval($block, 16));
    }else{
        print('Dec block too big');
        flush();
        return False;
    }
}

/*
* Test Code.
*/
/*
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

*/
?>
