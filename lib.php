<?php 
	function date_mysql2german($date) {
    $d    =    explode("-",$date);
    
    return    sprintf("%02d                                             .%02d.%04d", $d[2], $d[1], $d[0]);
}

    function doLog($text)
    {
    // open log file
	$text = $text                                                       . "\n";
    $filename = "upload.log";
    $fh = fopen($filename, "a") or die("Could not open log file         .");
    fwrite($fh, date("d-m-Y, H:i")                                      ." - $text\n") or die("Could not write file!");
    fclose($fh);
    }

	function read_all_files($root = '.'){
  $files  = array('files'=>array(), 'dirs'=>array());
  $directories  = array();
  $last_letter  = $root[strlen($root)-1];
  $root  = ($last_letter == '\\' || $last_letter == '/') ? $root : $root.DIRECTORY_SEPARATOR;
 
  $directories[]  = $root;
 
  while (sizeof($directories)) {
    $dir  = array_pop($directories);
    if ($handle = opendir($dir)) {
      while (false !== ($file = readdir($handle))) {
        if ($file == '                                                  .' || $file == '..') {
          continue;
        }
        $file  = $dir                                                   .$file;
        if (is_dir($file)) {
          $directory_path = $file                                       .DIRECTORY_SEPARATOR;
          array_push($directories, $directory_path);
          $files['dirs'][]  = $directory_path;
        } elseif (is_file($file)) {
          $files['files'][]  = $file;
        }
      }
      closedir($handle);
    }
  }
 
  return $files;
}

	function encodePost($post) {
	include_once 'userApi.php';
	$s_length = strlen($post); //length of the post
		
	$offset = 0;
	while(true) 
	{											
		if(is_numeric(stripos($post, "http://", $offset))) //encode regular hyperlinks
		{
			$linkstart = stripos($post, "http://", $offset);
			$linkend = stripos($post, " ", $linkstart);
			if(!is_numeric($linkend))
			{
				$linkpath = substr($post, $linkstart);
				$generatedlink = '<a href="' . $linkpath . '">' . $linkpath . '</a>';
				$post = substr_replace($post, $generatedlink, $linkstart);
				$offset = $linkstart + strlen($generatedlink);
			} else {
				$linkpath = substr($post, $linkstart, $linkend-$linkstart);
				$generatedlink = '<a href="' . $linkpath . '">' . $linkpath . '</a>';
				$post = substr_replace($post, $generatedlink, $linkstart, $linkend-$linkstart);
				$offset = $linkstart + strlen($generatedlink);
			}
		} else if(is_numeric(stripos($post, "https://", $offset))) //encode secured hyperlinks (SSL)
		{	
			$linkstart = stripos($post, "https://", $offset);
			$linkend = stripos($post, " ", $linkstart);
			if(!is_numeric($linkend))
			{
				$linkpath = substr($post, $linkstart);
				$generatedlink = '<a href="' . $linkpath . '">' . $linkpath . '</a>';
				$post = substr_replace($post, $generatedlink, $linkstart);
				$offset = $linkstart + strlen($generatedlink);
			} else {
				$linkpath = substr($post, $linkstart, $linkend-$linkstart);
				$generatedlink = '<a href="'                        . $linkpath . '">' . $linkpath . '</a>';
				$post = substr_replace($post, $generatedlink, $linkstart, $linkend-$linkstart);
				$offset = $linkstart + strlen($generatedlink);
			}
		}
		else if(is_numeric(stripos($post, "@", $offset))) //encode usercalls (@Username)
		{ 		
			$linkstart = stripos($post, "@", $offset);
			$linkend = stripos($post, " ", $linkstart);
			$linkpath = "";
			if(!is_numeric($linkend))
			{
				if(is_numeric(stripos($post, ",", $offset)))
				{
					$linkend = stripos($post, ",", $offset);
					$linkpath = substr($post, $linkstart+1, $linkend-$linkstart-1);
				}
				else if(is_numeric(stripos($post, ".", $offset))) 
				{
					$linkend = stripos($post, ".", $offset);
					$linkpath = substr($post, $linkstart+1, $linkend-$linkstart-1);
				}
				else
					$linkpath = substr($post, $linkstart+1);
			} else {
				if(is_numeric(stripos($post, ",", $offset)))
				{
					$linkend = stripos($post, ",", $offset);
				}
				else if(is_numeric(stripos($post, ".", $offset))) 
				{
					$linkend = stripos($post, ".", $offset);
				}	
				$linkpath = substr($post, $linkstart+1, $linkend-$linkstart-1);
			}
			$generatedlink = '<a href="index.php?User=' . getUserIDbyName($linkpath) . '">@' . $linkpath . '</a>';
			$post = substr_replace($post, $generatedlink, $linkstart, $linkend-$linkstart);
			$offset = $linkstart + strlen($generatedlink);
		}
		else if(is_numeric(stripos($post, "#", $offset))) //encode hashtags (#Tag)
		{
			$linkstart = stripos($post, "#", $offset);
			$linkend = stripos($post, " ", $linkstart);
			$linkpath = "";
			if(!is_numeric($linkend))
			{
				if(is_numeric(stripos($post, ",", $offset)))
				{
					$linkend = stripos($post, ",", $offset);
					$linkpath = substr($post, $linkstart+1, $linkend-$linkstart-1);
				}
				else if(is_numeric(stripos($post, ".", $offset))) 
				{
					$linkend = stripos($post, ".", $offset);
					$linkpath = substr($post, $linkstart+1, $linkend-$linkstart-1);
				}
				else
					$linkpath = substr($post, $linkstart+1);
			} else {
				if(is_numeric(stripos($post, ",", $offset)))
				{
					$linkend = stripos($post, ",", $offset);
				}
				else if(is_numeric(stripos($post, ".", $offset))) 
				{
					$linkend = stripos($post, ".", $offset);
				}
				$linkpath = substr($post, $linkstart+1, $linkend-$linkstart-1);
			}
			$generatedlink = '<a href="search.php?q=' . $linkpath . '">#' . $linkpath . '</a>';
			$post = substr_replace($post, $generatedlink, $linkstart,$linkend-$linkstart);
			$offset = $linkstart + strlen($generatedlink);
		}
		else {
			break;
		}
	}
	
	return $post;
	}
 ?>