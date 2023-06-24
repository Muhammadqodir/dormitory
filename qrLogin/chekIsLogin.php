<?php

session_start();
if(isset($_SESSION["isLogin"])){
  echo "true";
}else{
  echo "false";
}