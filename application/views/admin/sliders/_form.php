<div class="form-group row">
    <div class="col-sm-3">
        Caption
    </div>
    <div class="col-sm-4">
        <input type="text" name="caption" class="form-control" value="<?= $slider->caption ?>">
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-3">
        Upload Gambar
    </div>
    <div class="col-sm-4">
        <input type="file" name="file">
        <?php if($slider !='') { ?><img src="<?= base_url('assets/template/img/'.$slider->url) ?>" alt="" class="img-responsive"><?php } ?>
    </div>
    

</div>
<div class="form-group row">
    <div class="col-sm-3">
        Is Active
    </div>
    <div class="col-sm-4">
        <select name="active" class="form-control">
            <option value="1" <?= $slider->active == 1 ? 'selected' : '' ?>>Active</option>
            <option value="0" <?= $slider->active == 0 ? 'selected' : '' ?>>Non Active</option>
        </select>
    </div>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Simpan</button>
</div>