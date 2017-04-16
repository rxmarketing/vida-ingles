<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<a class="navbar-brand" href="#">CETEC Dashboard</a>
	<div class="collapse navbar-collapse" id="navbarsExampleDefault">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href=""><span class="fa fa-home fa-lg"></span> <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="groups.php"><span class="fa fa-book fa-lg"></span> Grupos</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="students.php">Estudiantes</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="modules.php">Módulos</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="http:" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
				<div class="dropdown-menu" aria-labelledby="dropdown01">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<a class="dropdown-item" href="#">Something else here</a>
				</div>
			</li>
		</ul>
      <?php include_once 'login-links-template.php'; ?>
	</div>
</nav>