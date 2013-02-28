<?php

require_once "db.php";
require_once "AuthModel.php";
require_once "AuthView.php";
require_once "CFDump.php";

$model = new AuthModel(MY_DSN, MY_USER, MY_PASS);
$view = new AuthView();

$username = empty($_POST['username']) ? '' : strtolower(trim($_POST['username']));
$password = empty($_POST['password']) ? '' : trim($_POST['password']);

$contentPage = 'form';
$user = NULL;


session_start();

if (!empty($_SESSION['userInfo'])) {
	$contentPage = 'success';
	$user = $_SESSION['userInfo'];
	
}
if (!empty($username) && !empty($password)) {
	$user = $model->getUserByNamePass($username, $password);
	# CFDump::dump($user, 0, 'user');
	if (is_array($user)) {
		$contentPage = 'success';
		
		$_SESSION['userInfo'] = $user;
	}
}


$view->show('header');
# CFDump::dump($_SESSION);
$view->show($contentPage, $user);
$view->show('footer');