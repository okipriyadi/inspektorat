<div class="card">
    <div class="card-body">
        <a href="<?= base_url() ?>welcome/create_news" class="btn btn-success">Tambah</a>
        <div class="table-responsive">
            <table class="table table-bor">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Gambar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($news as $key => $value) {
                        # code...
                    ?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><img src="<?= base_url('assets/template/img/'.$value->url) ?>" alt="gambar <?=$key?>" class="img-responsive"></td>
                            <td><?=$value->judul?></td>
                            <td><?=$value->active?></td>
                            <td>
                                <form action="" method="post">
                                    <a href="<?= base_url('welcome/edit_news/'.$value->id_news)?>" class="btn btn-primary">Edt</a>
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