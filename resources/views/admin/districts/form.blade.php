<div class="row">
  <div class="col-lg-6 col-xs-12">
    <div class="form-group">
      <label for="district_name">District Name</label>
      <input  type="text" id="district_name" name="district_name" class="form-control" placeholder="Enter District Name..." 
      value="{{ old('district_name') ??  $district->district_name }}" required >
    </div>
  </div>
</div>