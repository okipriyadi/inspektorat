<div class="form-group row">
    <div class="col-sm-3">
        Tanggal
    </div>
    <div class="col-sm-4">
        <input type="date" name="tanggal" class="form-control" value="<?= $schedule->tanggal ?>">
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-3">
        Caption
    </div>
    <div class="col-sm-4">
        <input type="text" name="caption" class="form-control" value="<?= $schedule->caption ?>">
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-3">
        Is Active
    </div>
    <div class="col-sm-4">
        <select name="active" class="form-control">
            <option value="1" <?= $schedule->active == 1 ? 'selected' : '' ?>>Active</option>
            <option value="0" <?= $schedule->active == 0 ? 'selected' : '' ?>>Non Active</option>
        </select>
    </div>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Simpan</button>
</div>