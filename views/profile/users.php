<div class = "col-sm-6">
            <?foreach($vars as $var):?>

                <form action="show" method="post">
                    <table>
                        <tbody>
                        <div class = "form-froup">
                            <tr><td>id:</td>     <td> <input type="text" value = "<?=$var['id']?>" name="user_id" readonly class = "form-control"/></td></tr>
                        </div>
                        <div class = "form-froup">
                            <tr><td>Имя:</td>     <td><input type="text" value = "<?=$var['name']?>" readonly class = "form-control"/></td></tr>
                        </div>
                        <div class = "form-froup">
                            <tr><td>Фамилия:</td> <td><input type="text"  value = "<?=$var['surname']?>" readonly class = "form-control"/></td></tr>
                        </div>
                        <div class = "form-froup">
                            <tr><td>Отчество:</td><td><input type="text"  value = "<?=$var['patronymic']?>" readonly class = "form-control"/></td></tr>
                        </div>
                            <tr><td><input type="submit" value = "Перейти в профиль"  class = "btn btn-primary" /></td></tr>
                        </tbody>
                    </table>

                </form>
        <?endforeach;?>
</div>