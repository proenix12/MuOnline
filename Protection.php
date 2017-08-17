<?php

  $crlf=chr(13).chr(10);
  $itime=3;  //Minimum number of seconds between one-visitor visits
  $imaxvisit=15;  //Maximum visits in $itime x $imaxvisits seconds
  $ipenalty=30;  //Minutes for waitting
  $iplogdir="./system/engine_logs/ProtectionLogs/";
  $iplogfile="AttackersIPs.Log";
  
  //Warning Messages:
  $message1='<br><font size="4" color="orange">Server under heavy bandwidth or being DDoS attacked!</font><br>';
  $message2='Please wait ... ';
  $message3=' seconds and try again to enter page.<br>';
  $message4= '<b>Website has been attacked from this IP address: '.$_SERVER["REMOTE_ADDR"].'</b><br>';
  $message5= '<font size="1">Keep in mind that page spamming is flood</font><br>';
//---------------------- End of Initialization ---------------------------------------  

  //Get file time:
  $ipfile=substr(md5($_SERVER["REMOTE_ADDR"]),-3);  // -3 means 4096 possible files
  $oldtime=0;
  if (file_exists($iplogdir.$ipfile)) $oldtime=filemtime($iplogdir.$ipfile);

  //Update times:
  $time=time();
  if ($oldtime<$time) $oldtime=$time;
  $newtime=$oldtime+$itime;

  //     Check human or bot:
  if ($newtime>=$time+$itime*$imaxvisit)
  {
    //     To block visitor:
    touch($iplogdir.$ipfile,$time+$itime*($imaxvisit-1)+$ipenalty);
    header("HTTP/1.0 503 Service Temporarily Unavailable");
    header("Connection: close");
    header("Content-Type: text/html");
    echo '<html><head><title>Server DDoS Protection</title></head><body><p align="center"><strong>'
          .$message1.'</strong>';
    echo $message2.$ipenalty.$message3.$message4.$message5.'</p></body></html>'.$crlf;
    //     logging:
    $fp=@fopen($iplogdir.$iplogfile,"a"); chmod($iplogdir.$iplogfile, 0777);
    if ($fp!==FALSE)
    {
      $useragent='<unknown user agent>';
      if (isset($_SERVER["HTTP_USER_AGENT"])) $useragent=$_SERVER["HTTP_USER_AGENT"];
      @fputs($fp,$_SERVER["REMOTE_ADDR"].' on '.date("D, d M Y, H:i:s").' as '.$useragent.$crlf);
    }
    @fclose($fp);
    exit();

  }

  //Modify file time:
  touch($iplogdir.$ipfile,$newtime);

?>