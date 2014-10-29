<div class="widget">
	<h2>Hello - <?php echo $_SESSION['first_name'] ?></h2>
	<div class="inner">
		<form action="logout.php" method="post">
			<ul id="login">
				<li class="link">
					<input type="submit" value="Log out"></li>
			</ul>
		</form>

	</div>
</div>
