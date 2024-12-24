<div class="row">
  <div class="col-md-12">
    <h5>Contact Management</h5>
    <br>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Contact Email</label>
          <input type="email" class="form-control" name="contact_email" placeholder="Contact Email"
          value="{{ $websiteSettingKeys['contact_email']->value ?? '' }}">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Phone</label>
          <input type="number" class="form-control" name="phone" placeholder="Enter Number"
          value="{{ $websiteSettingKeys['phone']->value ?? '' }}">
        </div>
      </div>
    </div>

    <h5 class="mt-3">Social Links</h5>
    <br>
    <div class="row">
      <div class="col-md-6">
        <label>Facebook</label>
        <input type="url" class="form-control" name="facebook_url" placeholder="Enter Facebook url..."
        value="{{ $websiteSettingKeys['facebook_url']->value ?? '' }}">
      </div>

      <div class="col-md-6">
        <label>Instagram</label>
        <input type="url" class="form-control" name="instagram_url" placeholder="Enter Instagram url..."
        value="{{ $websiteSettingKeys['instagram_url']->value ?? '' }}">
      </div>

      <div class="col-md-6">
        <label>Twitter</label>
        <input type="url" class="form-control" name="twitter_url" placeholder="Enter Twitter url..."
        value="{{ $websiteSettingKeys['twitter_url']->value ?? '' }}">
      </div>
    </div>

    <h5 class="mt-5">SEO Management</h5>
    <br>
    <div class="row">
      <div class="form-group">
        <label>SEO Meta Tags</label>
        <textarea class="form-control" name="meta_tags" rows="10"
        placeholder="Enter SEO Meta Tags...">{{ $websiteSettingKeys['meta_tags']->value ?? '' }}</textarea>
      </div>

      <div class="form-group">
        <label>SEO Meta Descriptions</label>
        <textarea class="form-control" name="meta_descriptions" rows="10"
        placeholder="Enter SEO Meta Description...">{{ $websiteSettingKeys['meta_descriptions']->value ?? '' }}</textarea>
      </div>
    </div>
  </div>
</div>