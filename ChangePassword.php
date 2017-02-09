<form class="form-horizontal"  id = "edit-user-form" method="'post">
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">Old Password:</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="old-pw" placeholder="Enter email" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">Username</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="username" placeholder="Enter email" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">New password:</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="new-pw" placeholder="Enter password" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Repeat password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="rpt-pwd" placeholder="Enter password" required>
        </div>
    </div>

</form>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button id="change-pwd-btn" class="btn btn-success">Edit Info</button>
    </div>
</div>