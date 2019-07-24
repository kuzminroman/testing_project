<!DOCTYPE html>
<html>
<head>
<title><?=$title?></title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<link rel="stylesheet" href="/js/bootstrap/dist/css/bootstrap.min.css" />
<script src = "/js/jquery-3.3.1.js"></script>
<script src="/js/bootstrap/dist/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="/js/bootstrapformhelpers/dist/css/bootstrap-formhelpers.min.css">
<script type="text/javascript" src="/js/bootstrapformhelpers/dist/js/bootstrap-formhelpers.min.js"></script>
<script src = "/js/script.js"></script>
<script src = "/js/sc.js"></script>
</head>
<body>

<?if($_SESSION['id'] === NULL):?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class = "container">
  	<div class="collapse navbar-collapse" id="navbar1">
    	<ul class="nav navbar-nav">
		<li class="nav-item" role = "separator">
		    	<a class="nav-link" href="/user/regist"> <label id = "color">Регистрация<label> </a>
		    </li>
			<li class="nav-item">
		    	<a class="nav-link" href="/user/login"> <label id = "color">Логин</label></a>
				
		    </li>
    	</ul>
  	</div>
	</div>
</nav>
<?elseif($_SESSION['id'] !== NULL):?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class = "container">
  	<div class="collapse navbar-collapse" id="navbar1">
    	<ul class="nav navbar-nav">
		<li class="nav-item" role = "separator">
		    </li>
			<li class="nav-item">
		    	<a class="nav-link" href="/profile/showMyProfile"> <label id = "color">Профиль</label></a>
		    </li>
            <li class="nav-item">
                <a class="nav-link" href="/profile/users"> <label id = "color">Справочник пользователей</label></a>
            </li>
			<li class="nav-item">
		    	<a class="nav-link" href="/profile/email"> <label id = "color">Почта</label></a>
		    </li>
			<li class="nav-item">
		    	<a class="nav-link" href="/profile/phone"> <label id = "color">Телефоны</label></a>
		    </li>
			<li class="nav-item">
		    	<a class="nav-link" name = "logout" href="/profile/logout"> <label id = "color"> Выход </label></a>
		    </li>
    	</ul>
  	</div>
	</div>
</nav>
<?endif;?>

<div class = "container">

<?=$content?>

</div>

</body>
</html>