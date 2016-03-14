<div style="<?php if(isset($_GET['p'])){echo'display:none;';}?>"><div style=""class="block" >
 <a href="admin.php?p=add_p&d_id=1" style="text-decoration:none; color:#000;"><div style="background: #E4E4E4;" class="sb si"><center><p style="padding: 10px 0;
background: #F4F4F4; ">Добавить</p></center>
        </div></a>
</div>

<div style=""class="block" >
 <a href="admin.php?p=edit_p&d_id=1" style="text-decoration:none; color:#000;"><div style="background: #E4E4E4;" class="sb si"><center><p style="padding: 10px 0;
background: #F4F4F4; ">Редактировать</p></center>
        </div></a>
</div>

<?php if($_SESSION['id'] == '1'){echo'<div style=""class="block" >
 <a href="admin.php?p=user" style="text-decoration:none; color:#000;"><div style="background: #E4E4E4;" class="sb si"><center><p style="padding: 10px 0;
background: #F4F4F4; ">Пользователи</p></center>
        </div></a>
</div>';}?>
</div>