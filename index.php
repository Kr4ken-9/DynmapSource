<?php 

$version = "0.4.2.1";
/*
* Original work from https://github.com/LinhyCZ/DynmapSource
* Original autor : LinhyCZ https://github.com/LinhyCZ
* Licence : GNU General Public License v2.0 
* http://choosealicense.com/licenses/gpl-2.0/
*
* Modified by AnthoDingo https://github.com/AnthoDingo/
** Modified by Alec123445 https://github.com/Alec123445
* Updated on 11/15/2016
* Version 0.3.7.3
* Repo : https://github.com/Alec123445/DynmapSource
*/

	$configfolder = getcwd() . "/config";
		if (!file_exists($configfolder))
	{
		$old_umask = umask(0);
		mkdir($configfolder, 0775);
		umask($old_umask);
		
	}
	if (!file_exists($configfolder . "/config.php"))
	{
		//file_put_contents($configfolder . "/config.php", file_get_contents("https://raw.githubusercontent.com/Alec123445/DynmapSource/Dynmap-Web/DynmapSource-0.3.7.1-Web/config/template-config.php"));
	}
	if (!file_exists($configfolder . "/users.php"))
	{
		//file_put_contents($configfolder . "/users.php", file_get_contents("https://raw.githubusercontent.com/Alec123445/DynmapSource/Dynmap-Web/DynmapSource-0.3.7.1-Web/config/template-users.php"));
	}
	if(!file_exists("config/config.php")){
		include "static/st_error.html";
		exit(1);
	}

	session_start();
	//include "dynmap-config.php";
	require_once("config/config.php");

	if(file_exists("config/users.php")){
		require_once("config/users.php");

	} else {
		$login = false;
	}
	$serverPort = $serverPort + 1;

	if(isset($_SESSION['token'])){
		if(isset($_POST['action2']))
		{
			if($_POST['action2'] == 'connect')
			{
				session_unset();
				session_destroy();
				session_start();
				include "static/st_map.php";
			}
		}
		if(isset($_POST['action'])){
			if($_POST['action'] == 'disconnect'){
				if($login == true)
				{
				session_unset();
				session_destroy();
				session_start();
				include "static/st_login.php";
				exit();
				}
				else
				{
				session_unset();
				session_destroy();
				session_start();
				include "static/st_disconnected";
				exit();
				}

			}
		}
		include "static/st_map.php";
	} else {
		if($login == true){
			$displayError = true;
			if(isset($_POST["username"])){
				foreach ($users as $user => $userdata) {
					if ($user == $_POST["username"]) {
						if ($userdata[0] == $_POST["password"]) {
							$_SESSION['token'] = crypt($userdata[0]);
							include "static/st_map.php";
							exit();
						}
					}
				}
			} else {
				$displayError = false;
			}
			include "static/st_login.php";
		} else {
			include "static/st_map.php";
		}
	}
?>