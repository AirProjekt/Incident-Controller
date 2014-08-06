<h3>List of users</h3>
<table class="table table-hover">
    <tr>
        <th>User name</th>
        <th>Name</th>
        <th>Last name</th>
        <th>Delete user</th>
    </tr>
    <?php foreach ($korisnik as $value):?>
    <tr>
        <td><?php echo $value['korisnicko_ime'] ?></td>
        <td><?php echo $value['ime'] ?></td>
        <td><?php echo $value['prezime'] ?></td>
        <td><a href="<?php echo base_url() ?>index.php/korisnik/delete/<?php echo $value['id'] ?>"><div class="glyphicon glyphicon-remove"></div></a></td>
    </tr>
    <?php endforeach ?>
</table>
