<div  class = "col-md-5">
<form action = "email" method = "POST" name = "email" >
<div class = "form-froup">
<? foreach($vars as $var):?>
<span> Основная почта </span>
<?php $basic = $var['basic'] ?>
<?= $var[$basic] ?>
<br/>
<div class = "form-froup">
<label for = "exampleInputText"> Основная почта </label>
<p><b>Выбрать почту: </b><input type = 'radio' name = 'email' value = 'first_email'></p>
<input name = "first_email" type="email" class="form-control" id = "exampleInputEmail" aria-describdby = "emailHelp" placeholder = "Email"
value = "<?=$var['first_email']?>"/>
</div>

<div class = "form-froup">
<label for = "exampleInputText"> Дополнительная почта </label>
<p><b>Выбрать почту: </b><input type = 'radio' name = 'email' value = 'second_email'></p>
<input name = "second_email" type="email" class="form-control" id = "exampleInputEmail" aria-describdby = "emailHelp" placeholder = "Email"
value = "<?=$var['second_email']?>"/>
</div>

</div>

<br/>
<input align = "" name = "update_email" type = "submit" class = "btn btn-primary" value = "Редактировать"/>
<?endforeach;?>
</form>
</div>