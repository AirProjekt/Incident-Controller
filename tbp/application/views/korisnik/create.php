<div class="page-header">
   <h2>New user entry</h2>
</div>

<?php if(validation_errors()!=''): ?>
<div class="alert alert-danger">
    <?php echo validation_errors(); ?>
</div>
<?php endif; ?>

<ul class="nav nav-pills nav-stacked pull-right">
  <li><a href="<?php echo base_url() ?>index.php/korisnik/index">List users</a></li>
</ul>
<?php echo form_open('korisnik/create') ?>
    <div class="form-group">
      <label for="userName">User name</label>
      <input type="input" class="form-control" name="userName" placeholder="User name" style="width: 10cm">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" placeholder="Password" style="width: 10cm">
    </div>
    <div class="form-group">
      <label for="passconf">Confirm password</label>
      <input type="password" class="form-control" name="passconf" placeholder="Password" style="width: 10cm">
    </div>
    <div class="form-group">
      <label for="name">Name</label>
      <input type="input" class="form-control" name="name" placeholder="Name" style="width: 10cm">    
    </div>
    <div class="form-group">
      <label for="lastName">Last name</label>
      <input type="input" class="form-control" name="lastName" placeholder="Last name" style="width: 10cm">
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>