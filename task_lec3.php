<?php
session_start();
class session{

function set($key , $value){
    $_SESSION[$key] = $value ;
}
//---------------------------
function get($key){
    if(isset($_SESSION[$key])){
        return $_SESSION[$key] ;
    }else{
        return "Not Found session" ;
    }
}
//--------------------------
function flash($key){
    if(isset($_SESSION[$key])){
        echo $_SESSION[$key];
        unset($_SESSION[$key]) ;
    }else{
        return "Not Found session" ;
    }  
}
//---------------------------
function remove($key){
    if(isset($_SESSION[$key])){
        unset($_SESSION[$key]) ;
    }else{
        return "Not Found session" ;
    }    
}
//--------------------------
function removeAll(){
    session_unset();
    session_destroy();
}
//--------------------------
function getAll(){
    return $_SESSION;
}
//---------------------------
function check($key){
    if(isset($_SESSION[$key])){
        return "session found" ;
    }else{
        return "session not found" ;
    }
}

}

$ses1 = new session;
$ses1->set('m', 'mohamed');
$ses1->set('s', 'saber');
$ses1->set('r', 'refat');
// $ses1->flash('m');
// echo $ses1->get('m');
// echo $ses1->get('s');
// echo $ses1->get('r');
// $ses1->removeAll();
// echo $ses1->get('m');
// echo $ses1->get('s');
// echo $ses1->get('r');
// print_r($ses1->getAll());
$ses1->removeAll();
echo $ses1->check('m');