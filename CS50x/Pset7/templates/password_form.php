<form action="password.php" method="post">
    <fieldset>
        <div class="form-group">
            <input class="form-control" name="currentpassword" placeholder="Current Password" type="password"/>
        </div>
	    <div class="form-group">
            <input class="form-control" name="password" placeholder="New Password" type="password"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="conpassword" placeholder="Current Password" type="password"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Change</button>
        </div>
    </fieldset>
</form>
<div>
    or <a href="logout.php">log out</a>
</div>
