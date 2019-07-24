<div  class = "col-md-5">
<form action = "phone" method = "POST" name = "phone" >
<div class = "form-froup">

<? foreach($vars as $var):?>
<span>Основной:</span><b>
<?php $basic = $var['basic'] ?>
<?= $var[$basic]?>
</b>
<br/>

<div class = "form-froup">
<label for = "exampleInputText"> Мобильный телефон</label>
<p><b>Основной: </b><input type = 'radio' name = 'phone' value = 'mobile'></p>
<input name = "mobile" type="text" class="form-control bfh-phone" data-country="RU"  aria-describdby = "textHelp" placeholder = "Phone"
value = "<?=$var['mobile']?>"/>
</div>

<div class = "form-froup">
<label for = "exampleInputText"> Домашний телефон </label>
<p><b>Основной: </b><input type = 'radio' name = 'phone' value = 'home'></p>
<input name = "home" type="text" class="form-control bfh-phone" data-country="RU"  aria-describdby = "textHelp" placeholder = "Phone"
value = "<?=$var['home']?>"/>
</div>

<div class = "form-froup">
<label for = "exampleInputText"> Рабочий телефон </label>
<p><b>Основной: </b><input type = 'radio' name = 'phone' value = 'work'></p>
<input name = "work" type="text" class="form-control bfh-phone" data-country="RU"  aria-describdby = "textHelp" placeholder = "Phone"
value = "<?=$var['work']?>"/>
</div>
</div>

<br/>
<input align = "" name = "update_phone" type = "submit" class = "btn btn-primary" value = "Редактировать"/>
<?endforeach;?>
</form>
</div>