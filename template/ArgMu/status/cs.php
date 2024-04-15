<? 
if ($check=@fsockopen($RafaMaster['db_host'],$RafaMaster['Puerto']['GsSig'],$ERROR_NO,$ERROR_STR,0.1)) 
   {
   fclose($check);
   echo '<img src="template/'.$core['config']['template'].'/images/online.gif" alt="Online">'; 
   } 
   else 
   {  
   echo '<img src="template/'.$core['config']['template'].'/images/offline.gif" alt="Offline">'; 
   } 
?>