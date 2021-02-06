<?PHP
// important globals
$_COOKIE    //  dane przetrzymywane w cookisach
$_SESSION   //  dane dotyczące sesji
$_GET       //  dane przesłane w adresie np. z formularza metodą GET
$_POST      //  dane przesłane np. z formularza oczywiście metodą POST
$GLOBALS    //  preinstalowa zmienna globalna

include('funkcje.php')          //  dodanie pliku do skryptu jako... wklejenie kodu w tym miejscu
require_once('funkcje2.php')    //  dodanie informacji że by szukać danych w tym pliku, nie jest to bezpośrednie wklejenie kodu

/*
    PRZYDATNE FUNKCJE
*/
//  połączenie z bazą MySQL
function MySqlConnection(){
	$host="localhost";
	$user="user";
	$pass="pass";
    $baza="baza";
    //  First check if connection is set, if so then return link
    if( isset($GLOBALS['mysql_link']) )
        if($GLOBALS['mysql_link'])
		    return $GLOBALS['mysql_link'];
	$GLOBALS['mysql_link'] = mysql_connect( $host,$user,$pass) or die('Could not connect to server.' );
	mysql_select_db($baza, $GLOBALS['mysql_link']) or die('Could not select database.');
    return $GLOBALS['mysql_link'];
}

//  jeden ze sposobów wyświetlania treści w zależności która strona została wybrana.
//  1. założenie jest że strona jest statyczna
//  2. w przypadku gdy na różnych stronach robimy różne rzeczy a nie tylko wyświetlamy tekst
function GetSwitchPage(){
    switch($_GET['page']){
        case 'start':   page_start();
        case 'omnie':   page_omnie();
        default     :   no_such_page();
    }
}
?>
