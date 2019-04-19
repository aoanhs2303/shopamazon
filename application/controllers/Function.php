<?php 

function vn_to_str ($str){
  $unicode = array( 
    'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',  
    'd'=>'đ',  
    'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',  
    'i'=>'í|ì|ỉ|ĩ|ị',  
    'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',  
    'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',  
    'y'=>'ý|ỳ|ỷ|ỹ|ỵ',  
    'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',  
    'D'=>'Đ',  
    'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',  
    'I'=>'Í|Ì|Ỉ|Ĩ|Ị',  
    'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',  
    'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',  
    'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
  );
  foreach($unicode as $nonUnicode=>$uni){  
    $str = preg_replace("/($uni)/i", $nonUnicode, $str);
  }
  
  $str = preg_replace("/[^A-Za-z0-9\s]/", "", $str);
  $str = str_replace(' ','-',$str); 
  $str = str_replace('--','-',$str);
  $str = strtolower($str);

  return $str;   
}

function slugify($text) {
  $text = strtolower($text);
  $text = preg_replace ('/[\W_]+/', '-', $text);
  return $text;
}


function pathName($text) {
  $text = explode(')(', $text);
  $text[0] = mb_substr($text[0], 1);
  $text[sizeof($text) - 1] = substr_replace(end($text), "", -1);
  
  $path = array();
  foreach ($text as $key => $textEle) {
    $textEle = explode('(', $textEle)[0];
    array_push($path, $textEle);
  }

  return slugify(implode('-', $path));
}

function cmpCof($a, $b) {
  return strnatcmp($b['confidence'], $a['confidence']);
}



function readFileAndHandleForYou($path) {
  $file = fopen($path,"r");
  $temp = array();
  while(!feof($file)) {
    try {
      $r = fgets($file);
      $r = explode(',', explode(' --> ', $r)[1]);
      preg_match_all('!\d+!', $r[0], $m1);
      preg_match_all('/(\d+.?\d+)/', $r[1], $m2);
      $productId = $m1[0][0];
      $conf = $m2[0][0];
      $rcm['productid'] = $productId; 
      $rcm['confidence'] = $conf; 
      array_push($temp, $rcm);
      error_reporting(0);
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }    
  }

  usort($temp,"cmpCof");
  fclose($file);
  return $listRCM = array_slice($temp, 0, 5, true);
}

function Login() {
    if(isset($_SESSION['Username'])) {
        return true;
    }
}

function Logout()
{
	if(isset($_SESSION['Username'])) {
        session_destroy(); 
    }
}


function Confirm_Login() {
    if(!Login()) {
        redirect(base_url().'login');
    }
}

?>