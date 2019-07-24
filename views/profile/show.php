<br/>
<div class = "col-sm-6">
<form action = "show" method = "POST" name = "edit" >
<div class = "form-froup">
<?foreach($vars as $var):?>

    <div class = "form-froup">
        <input name = "id_us" type = "text" class = "form-control" placeholder = "id"
               value = "<?=$var['id']?>" readonly/>
    </div>

    <div class = "form-froup">

    <input id = "name" name = "name" type = "text" class = "form-control" placeholder = "Name"
value = "<?=$var['name']?>"/> 
</div>

<div class = "form-froup">
<input name = "surname" type = "text" class = "form-control" placeholder = "Surname" 
value = "<?=$var['surname']?>"/>
</div>

<div class = "form-froup">
<input name = "patronymic" type = "text" class = "form-control" placeholder = "Surname" 
value = "<?=$var['patronymic']?>"/>
</div>
<?php
if ($_SESSION['id'] == 35):?>
<br/>
<input align = "" id = "edit" name = "edit" type = "submit" class = "btn btn-primary" value = "Редактировать"/>
<input align = "" id = "delete" name = "delete" type = "submit" class = "btn btn-danger" value = "Удалить профиль"/>
<?endif;?>
<?endforeach;?>
</form>
</div>