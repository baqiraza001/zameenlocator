<div class="row">
  <div class="col-md-12 mb-2">
    <?php for ($i = 1; $i <= 4; $i++) { ?>
      <div class="form-group">
        <label for="img<?= $i ?>">Upload Image <?php
        if($i == 1){
          $size = ['466x284','182x158','109x174','182x158'];
        }
        ?> <?= $i ?> Size: <?= $size[$i-1] ?></label>
        <input type="file" class="form-control fcSub" placeholder="" name="img<?= $i ?>">
      </div>
    <?php } ?>
  </div>
</div>