<div style="display: flex;"class="block" align="justify">
  <a href="admin.php?p=delete_p&p_id=1" style="text-decoration:none; color:#000; margin-right:5px;"><div style="background: #E4E4E4;" class="sb"><center><p style="padding: 10px 0;
background: #F4F4F4; ">Профильные дисциплины</p></center>
        </div></a>
    <a href="admin.php?p=delete_p&p_id=2" style="text-decoration:none; color:#000;  margin-right:5px;"><div style="background: #E4E4E4;" class="sb"><center><p style="padding: 10px 0;
background: #F4F4F4; ">Общеобразовательные дисциплины</p></center>
        </div></a>
    <a href="admin.php?p=delete_p&p_id=3" style="text-decoration:none; color:#000;"><div style="background: #E4E4E4;" class="sb"><center><p style="padding: 10px 0;
background: #F4F4F4; ">Обязательные дисциплины</p></center>
        </div></a>
    </div>
<div style="<?php if(!isset($_GET['p_id'])){echo'display:none;';}?>"class="block" align="justify">
    
    
    
    
<?php
if(isset($_GET['p_id'])){
$d_id = $_GET['p_id'];
echo '<ul class="spis">';
include ("db.php");

$result = mysql_query("SELECT * FROM predmety WHERE d_id='$d_id'",$connection); 
    $myrow = mysql_fetch_array($result);
do
{
	printf(" <li><a href='index.php?d=1&p=".$myrow['id']."'>".$myrow['name']."</a><span style='float:right;'><a href='' style='margin-right:5px;'>✎</a><a href=''>✖</a></span></li>");
}
while($myrow = mysql_fetch_array($result));
echo ' </ul>';}
         ?>
       
</div>