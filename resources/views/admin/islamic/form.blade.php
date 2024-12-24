<div class="row">
  <div class="col-lg-6 col-xs-12">
    <div class="form-group">
      <label>Quran</label>
      <textarea class="form-control" name="ayat" rows="5">{{ old('ayat') ??  $islamic->ayat }}</textarea>
    </div>
  </div>
  <div class="col-lg-6 col-xs-12">
    <div class="form-group">
      <label>Quran Translation</label>
      <textarea class="form-control" name="trans" rows="5">{{ old('trans') ??  $islamic->trans }}</textarea>
    </div>
  </div>

  <br><br>
  <div class="col-lg-6 col-xs-12">
    <div class="form-group">
      <label>Hadees</label>
      <textarea class="form-control" name="hadess" rows="5">{{ old('hadess') ??  $islamic->hadess }}</textarea>
    </div>
  </div>
  <div class="col-lg-6 col-xs-12">
    <div class="form-group">
      <label>Hadees Translation</label>
      <textarea class="form-control" name="translation" rows="5">{{ old('translation') ??  $islamic->translation }}</textarea>
    </div>
  </div>
</div>