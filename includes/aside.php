<aside>

<?php 

if (isset($_SESSION) == false) {

	include 'includes/widgets/login_widget.php';

} else {

	include 'includes/widgets/logout_widget.php';

}


?>

</aside>
