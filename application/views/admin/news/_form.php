<div class="form-group row">
    <div class="col-sm-12">
        Tanggal
    </div>
    <div class="col-sm-12">
        <input type="date" name="date" class="form-control" value="<?= $news->date ?>">
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-12">
        Judul
    </div>
    <div class="col-sm-12">
        <input type="text" name="judul" class="form-control" value="<?= $news->judul ?>">
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-12">
        Konten
    </div>
    <div class="col-sm-12">
        <textarea name="content" class="form-control" id="berita_c"><?=$news->content?></textarea>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-12">
        Upload Gambar
    </div>
    <div class="col-sm-12">
        <input type="file" name="file">
        <?php if($news !='') { ?><img src="<?= base_url('assets/template/img/'.$news->url) ?>" alt="" class="img-responsive"><?php } ?>
    </div>
    

</div>
<div class="form-group row">
    <div class="col-sm-12">
        Is Active
    </div>
    <div class="col-sm-12">
        <select name="active" class="form-control">
            <option value="1" <?= $news->active == 1 ? 'selected' : '' ?>>Active</option>
            <option value="0" <?= $news->active == 0 ? 'selected' : '' ?>>Non Active</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-12">
        URL Selengkapnya
    </div>
    <div class="col-sm-12">
        <input type="url" name="selengkapnya" class="form-control" value="<?= $news->selengkapnya ?>">
    </div>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Simpan</button>
</div>