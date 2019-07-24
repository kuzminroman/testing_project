<br/>
            <?foreach($vars as $var):?>

                <div class="row">
        <div class = "col-sm-2">
                <div class = "form-froup">
                    <a href = "/../../src/img/profile/<?= $var['img'] == NULL? "happy.jpg": $var['img']?>"><img src = "/../../src/img/profile/<?= $var['img'] == NULL? "happy.jpg": $var['img']?>" width="150" height="150"/></a>
                </div>
        </div>
                    <form method="post" enctype="multipart/form-data" action = "showMyProfile">
                        <div>
                            <label for="profile_pic">Обновить изображение</label>
                            <input type="file" name="img_profile"
                                   accept=".jpg, .jpeg, .png" />
                        </div>
                        <div>
                            <input type="submit" value="Выбрать фото" name = "upd_img" class = "btn btn-primary" />
                        </div>
                    </form>
<br/>
<br/>
            <div class = "col-sm-6">
                <form method = "POST" name = "edit" >
                <div class = "form-froup">

                <input id = "name" name = "name" type = "text" class = "form-control" placeholder = "Name"
                   value = "<?=$var['name']?>"/>

            <input name = "surname" type = "text" class = "form-control" placeholder = "Surname"
                   value = "<?=$var['surname']?>"/>

            <input name = "patronymic" type = "text" class = "form-control" placeholder = "Surname"
                   value = "<?=$var['patronymic']?>"/>

        <br/>
        <input align = "" id = "edit" name = "edit" type = "submit" class = "btn btn-primary" value = "Редактировать"/>
        <a href = "/profile/delete"><button class = "btn btn-danger">Удалить профиль</button></a>
                </div>
                </div>
                </div>
    </form>
        <?endforeach;?>

</div>