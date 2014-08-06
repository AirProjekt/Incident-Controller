<h3>List of incidents</h3>
<table class="table table-hover">
    <tr>
        <th>Naziv</th>
        <th>Grad</th>
        <th>Adresa</th>
        <th>Datum i vrijeme početka</th>
        <th>Trajanje</th>
        <th>Vrsta</th>
        <th>Korisnik</th>
        <th>Centar</th>
        <th>Status</th>
    </tr>
    <?php while ($value = $incident->_fetch_assoc()):?>
    <tr>
        <td><?php echo $value['naziv'] ?></td>
        <td><?php echo $value['grad'] ?></td>
        <td><?php echo $value['adresa'] ?></td>
        <td><?php echo $value['dat_i_vr_pocetka'] ?></td>
        <td><?php echo $value['trajanje'] ?></td>
        <td><?php echo $value['vrsta'] ?></td>
        <td><?php echo $value['korisnicko_ime'] ?></td>
        <td><?php echo $value['adr'].' '.$value['kcb'] ?></td>
        <td><?php echo ($value['otvoren']=='t') ? "Otvoren" : "Zatvoren"; ?></td>
        <td><a href="<?php echo base_url() ?>index.php/incident/close/<?php echo $value['id']; ?>"><div class="glyphicon glyphicon-lock"></div></a></td>
    </tr>
    <?php endwhile; ?>
</table>
