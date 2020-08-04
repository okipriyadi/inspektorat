<div class="card">
    <div class="card-body">
        <a href="<?= base_url() ?>welcome/create_slider" class="btn btn-success">Tambah</a>
        <div class="table-responsive">
            <table class="table table-bor">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Caption</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($sliders as $key => $value) {
                        # code...
                    ?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><img src="<?= base_url('assets/template/img/'.$value->url) ?>" alt="gambar <?=$key?>" class="img-responsive"></td>
                            <td><?=$value->caption?></td>
                            <td><?=$value->active?></td>
                            <td>
                                <form action="" method="post">
                                    <a href="<?= base_url('welcome/edit_slider/'.$value->id_sliders)?>" class="btn btn-primary">Edt</a>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>