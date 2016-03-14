<?php 

   $u_id = $_SESSION['id'];
    
        $result = mysql_query("SELECT * FROM user_info WHERE uid='$u_id' AND type = 'u' ",$connection);
    $myrow = mysql_fetch_array($result);
if(!empty($myrow['id'])){
echo'
<script>
$(document).ready(function() {  
  $("ul.tabs").each(function() {
    $(this).find("li").each(function(i) {
      $(this).click(function() {
        $(this).addClass("active").siblings().removeClass("active");
        var p = $(this).parents("div.tabs_container");
        p.find("div.tab_container").hide();
        p.find("div.tab_container:eq(" + i + ")").show();
      });
    });
  });
})</script>
<style>
.tabs_container {
  margin-top:10px;
}

.tabs{
  padding: 0;
}
    .block{margin-top:0;}
.tabs_container .tabs{
  margin: 0 !important;
}

.tabs_container .tabs li {
  cursor: pointer;  
  background: #dddddd;
  border-bottom: 1px solid #e0e0e0;
  padding: 5px 25px;
  margin: 0 !important;
}

.tabs_container .tabs li.active {
  border: 1px solid #fff;
  border-bottom: 1px solid #fff;background: #fff;
}

.tab_container {
  display: none;
  background: #fff;
  border: 1px solid #e0e0e0; 
 
  margin: -1px 0 0 0;
}
  
.tab_container ul li {
  margin: 0 0 8px 0;
} 

.inl-bl{
  display: inline-block;
}
</style>
 <div class="tabs_container">
  <ul class="tabs">
    <li class="inl-bl active">Дисциплины</li>
    <li class="inl-bl">Повышение квалификации</li>
  </ul>
  <div class="tab_container" style="display: block;">';}

?>

 <div style="font-weight:400; display: flex;"class="block">
  
    <div style="margin-right: 10px;background: #E4E4E4;" class="sb"><center><p style="padding: 10px 0;
background: #F4F4F4; border-bottom: 1px solid #CDCDCD; text-indent: 0px;">Профильные дисциплины</p></center>
        <ul style="list-style: none; padding: 0px!important; " class="distp"><center>
            <?php
include ("db.php");

$result = mysql_query("SELECT * FROM predmety WHERE d_id='1'",$connection); 
    $myrow = mysql_fetch_array($result);
do
{
printf("<a href='index.php?d=1&p=".$myrow['id']."'> <li  style='border-bottom:1px solid #D8D8D8;padding: 5px!important;'>".$myrow['name']."</li></a>");
}
while($myrow = mysql_fetch_array($result));
         ?>
            </center>
        </ul>
        
        </div>
    
    <div style="margin-right: 10px;background: #E4E4E4;" class="sb"><center><p style="padding: 10px 0;
background: #F4F4F4; border-bottom: 1px solid #CDCDCD; text-indent: 0px;">Общеобразовательные дисциплины</p></center>
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
background: #F4F4F4; border-bottom: 1px solid #CDCDCD;  text-indent: 0px;">Базовые дисциплины</p></center>
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
    
        </div>
</div> <?php
   $u_id = $_SESSION['id'];
    
        $result = mysql_query("SELECT * FROM user_info WHERE uid='$u_id' AND type = 'u' ",$connection);
    $myrow = mysql_fetch_array($result);  
if(!empty($myrow['id'])){
echo '</div>
  <div class="tab_container">';
    include('kval.php');
 echo' </div>
</div>';} ?>