<div class="page-header">
   <h2>New incident entry</h2>
</div>

<?php if(validation_errors()!=''): ?>
<div class="alert alert-danger">
    <?php echo validation_errors(); ?>
</div>
<?php endif; ?>

<ul class="nav nav-pills nav-stacked pull-right">
  <li><a href="<?php echo base_url() ?>index.php/incident/index">List incidents</a></li>
  <li><a href="<?php echo base_url() ?>index.php/incident/showMap">Show map</a></li>
</ul>
<?php echo form_open('incident/create') ?>
    <div class="form-group">
      <label for="userName">Naziv</label>
      <input type="input" class="form-control" name="naziv" placeholder="Naziv" style="width: 10cm">
    </div>
    <div class="form-group">
      <label for="password">Grad</label>
      <input type="input" class="form-control" name="grad" placeholder="Grad" style="width: 10cm">
    </div>
    <div class="form-group">
      <label for="passconf">Adresa</label>
      <input type="input" class="form-control" name="adresa" placeholder="Adresa" style="width: 10cm">
    </div>
    <div class="form-group">
      <label for="name">Kućni broj</label>
      <input type="input" class="form-control" name="kucni_broj" placeholder="Kućni broj" style="width: 5cm">    
    </div>
    <div class="form-group">
      <label for="lastName">Vrsta</label>
      <select class="form-control" style="width: 7cm" name="vrsta">
        <option value = 'policijska_intervencija'>Policijska intervencija</option>
        <option value = 'medicinska_intervencija'>Medicinska intervencija</option>
        <option value = 'poplava'>Poplava</option>
        <option value = 'požar'>Požar</option>
      </select>
    </div>
    <div class="form-group">
      <label for="lastName">Obavio centar</label>
      <select class="form-control" style="width: 5cm"  name="centar_id">
      <?php foreach ($centar as $centar_item): ?>
          <option value="<?php echo $centar_item['id'] ?>"><?php echo $centar_item['adresa'].' '.$centar_item['kucni_broj'] ?></option>
      <?php endforeach; ?>
      </select>
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>