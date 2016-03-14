 <style>
     .sb{width:462px;}
</style>
 <div style="font-weight:400; display: flex;"class="block">
  
 <div style="margin-right: 10px;background: #E4E4E4;" class="sb"><center><p style="padding: 10px 0;
background: #F4F4F4; border-bottom: 1px solid #CDCDCD; text-indent: 0px;">Повышение квалификации</p></center>
        <ul style="list-style: none; padding: 0px!important; " class="distp"><center>
            <?php
include ("db.php");

$result = mysql_query("SELECT * FROM predmety WHERE d_id='2'",$connection); 
    $myrow = mysql_fetch_array($result);
do
{
	printf("<a href='index.php?d=2&p=".$myrow['id']."'> <li  style='border-bottom:1px solid #D8D8D8;padding: 5px!important;'>".$myrow['name']."</li></a>");
}
while($myrow = mysql_fetch_array($result));
         ?>
            </center>
        </ul>
        
        </div>
    
    <div style="background: #E4E4E4;" class="sb"><center><p style="padding: 10px 0;
background: #F4F4F4; border-bottom: 1px solid #CDCDCD;  text-indent: 0px;">Научная литература</p></center>
        <ul style="list-style: none;  padding:  0px!important;" class="distp"><center>
            <?php
include ("db.php");

$result = mysql_query("SELECT * FROM predmety WHERE d_id='3'",$connection); 
    $myrow = mysql_fetch_array($result);
do
{
printf("<a href='index.php?d=3&p=".$myrow['id']."'> <li  style='border-bottom:1px solid #D8D8D8;padding: 5px!important;'>".$myrow['name']."</li></a>");
}
while($myrow = mysql_fetch_array($result));
         ?>
            </center>
        </ul>
    
     </div></div>