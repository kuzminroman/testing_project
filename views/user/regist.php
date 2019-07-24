<div class = "col-md-6">
<form action = "regist" method = "POST" name = "regist" >

<div class = "form-froup">
<label for = "exampleInputText"> Имя </label>
<input name = "name" type = "text" class = "form-control" placeholder = "Name" />
</div>

<div class = "form-froup">
<label for = "exampleInputText"> Фамилия </label>
<input name = "surname" type = "text" class = "form-control" placeholder = "Surname"/>
</div>

<div class = "form-froup">
<label for = "exampleInputText"> Отчество </label>
<input name = "patronymic" type = "text" class = "form-control" placeholder = "Patronymic"/>
</div>

<div class = "form-froup">
<label for = "exampleInputText"> Основной: Мобильный </label>
<input name = "phone" type = "radio" value = "mobile" checked = "checked"/>
<input name = "mobile" type="text" class="form-control bfh-phone" data-country="RU"  aria-describdby = "textHelp" placeholder = "Phone"/>
</input>
<br/>
<b><a id = "home" href = "#">Добавить домашний телефон</a></b>
<br/>
<b><a id = "work" href = "#">Добавить рабочий телефон</a></b>

<div id = "show">

</div>
</div>

<div class = "form-froup">
<label for = "exampleInputEmail"> Почта </label>
<input name = "first_email" type = "email" class = "form-control" 
id = "exampleInputEmail" aria-describdby = "emailHelp" placeholder = "Email"/>
<b><a id = "addmail" href = "#"> Добавить дополнительную почту</a></b>
<div id = "semail">

</div>
</div>

<div class = "form-froup">
<label for = "exampleInputPass"> Пароль </label>
<input name = "pass" type = "password" class = "form-control" 
id = "exampleInputPass" placeholder = "Password"/>
</div>
<br/>
<button align = "" name = "regist" type = "submit" class = "btn btn-primary">Регистрация</button>

</form>
</div>