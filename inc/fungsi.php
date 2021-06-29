<?php
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1)
{
	echo "<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>";
	exit("Direct access not permitted.");
}
//status informasi pada saat eksekusi database


function anti_injection($data){
  $filter  = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
  return $filter;
}

function NewGuid() {
    $s = strtoupper(md5(uniqid(rand(),true)));
    $guidText =
        substr($s,0,8) . '-' .
        substr($s,8,4) . '-' .
        substr($s,12,4). '-' .
        substr($s,16,4). '-' .
        substr($s,20);
    return $guidText;
}
function jin_date_str($date){
	$exp = explode('-',$date);
	if(count($exp) == 3) {
		$date = $exp[2].'/'.$exp[1].'/'.$exp[0];
	}
	return $date;
}




function encrypt($pure_string, $encryption_key) {
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $encryption_key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
    return $encrypted_string;
}

/**
 * Returns decrypted original string
 */
function decrypt($encrypted_string, $encryption_key) {
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $encryption_key, $encrypted_string, MCRYPT_MODE_ECB, $iv);
    return $decrypted_string;
}


function konversi_tanggal($format, $tanggal="now", $bahasa="id"){
 $en=array("Sun","Mon","Tue","Wed","Thu","Fri","Sat","Jan","Feb",
 "Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");

 $id=array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu",
 "Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September",
 "Oktober","Nopember","Desember");

 // tambahan untuk bahasa prancis
 // sumber http://w.blankon.in/6V
 $fr = array("dimanche","lundi","mardi","mercredi","jeudi","vendredi","samedi",
 "janvier","février","mars","avril","Mei","mai","juillet","aoùt","septembre",
 "octobre","novembre","décembre");

 // mengganti kata yang berada pada array en dengan array id, fr (default id)
 return str_replace($en,$$bahasa,date($format,strtotime($tanggal)));
};

function time_ago( $date )
{
    if( empty( $date ) )
    {
        return "No date provided";
    }

    $periods = array("detik", "menit", "jam", "hari", "minggu", "bulan", "tahun", "dekade");

    $lengths = array("60","60","24","7","4.35","12","10");

    $now = time();

    $unix_date = strtotime( $date );

    // check validity of date

    if( empty( $unix_date ) )
    {
        return "Bad date";
    }

    // is it future date or past date

    if( $now > $unix_date )
    {
        $difference = $now - $unix_date;
        $tense = "yang lalu";
    }
    else
    {
        $difference = $unix_date - $now;
        $tense = "dari sekarang";
    }

    for( $j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++ )
    {
        $difference /= $lengths[$j];
    }

    $difference = round( $difference );

    if( $difference != 1 )
    {
        $periods[$j].= "";
    }

    return "$difference $periods[$j] {$tense}";

}

function RemoveXSS($val) {
	$val = stripslashes(strip_tags(htmlspecialchars($val,ENT_QUOTES)));
    $val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val);

   $search = 'abcdefghijklmnopqrstuvwxyz';
   $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $search .= '1234567890!@#$%^&*()';
   $search .= '~`";:?+/={}[]-_|\'\\';
   for ($i = 0; $i < strlen($search); $i++) {
       $val = preg_replace('/(&#[xX]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val); // with a ;
       $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); // with a ;
   }

   $ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
   $ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
   $ra = array_merge($ra1, $ra2);

   $found = true;
   while ($found == true) {
      $val_before = $val;
      for ($i = 0; $i < sizeof($ra); $i++) {
         $pattern = '/';
         for ($j = 0; $j < strlen($ra[$i]); $j++) {
            if ($j > 0) {
               $pattern .= '(';
               $pattern .= '(&#[xX]0{0,8}([9ab]);)';
               $pattern .= '|';
               $pattern .= '|(&#0{0,8}([9|10|13]);)';
               $pattern .= ')*';
            }
            $pattern .= $ra[$i][$j];
         }
         $pattern .= '/i';
         $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2); // add in <> to nerf the tag
         $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags
         if ($val_before == $val) {
            $found = false;
         }
      }
   }
   return $val;
}

function logme($val)
{
	session_start();
	date_default_timezone_set("Asia/Jakarta");
	$_logfilename = "log/log_".date("Y-m-d");
	if(!file_exists($_logfilename)){
	    $_logfilehandler = fopen($_logfilename,'w');
	    fwrite($_logfilehandler, "== System Log Tracking ==\n");
	    fclose($_logfilehandler);
	}else{
	    $_logfilehandler = fopen($_logfilename,'a');
	}
	//action
	$ref=$_SERVER['HTTP_REFERER']?$_SERVER['HTTP_REFERER']:'No Rerefer';
	$ip=$_SERVER['REMOTE_ADDR'];
	$tanggal=date('Y:m:d H:i:d');
	$data=$tanggal.'-'.$ip.'-'.$_SESSION['username'].'-'.$ref.'-'.$val;
	$usr=$_SESSION['username'];
	fwrite($_logfilehandler,$data);
	fwrite($_logfilehandler, "\n");
	fclose($_logfilehandler);

}

function cek_email($email){

   $exp = "^[a-z\'0-9]+([._-][a-z\'0-9]+)*@([a-z0-9]+([._-][a-z0-9]+))+$";

   if(eregi($exp,$email)){

      if(checkdnsrr(array_pop(explode("@",$email)),"MX")){
        return true;
      }else{
        return false;
      }

   }else{

      return false;

   }
}

?>
