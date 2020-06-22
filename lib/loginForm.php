	<form class="form-horizontal" method="POST" action="login.php">
		<div class="row">	
			<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-heading"><h3 class="panel-title">Login</h3></div>
					<div class="panel-body">
						<input type="hidden" id="fromURL" name="fromURL" value="<?php echo $fromURL;?>">
					
						<div class="form-group">
							<label for="username" class="col-sm-2 control-label">username</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="username" name="username">
							</div>
						</div>
		
						<div class="form-group">
							<label for="password" class="col-sm-2 control-label">password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="password" placeholder="" name="password">
							</div>
						</div>					
						
						<div class="form-group">
							<div class="col-md-8">
								<button id="submit" name="login" value="1" class="btn btn-success">Login</button>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</form>