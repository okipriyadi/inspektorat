<div class="card">
    <div class="card-body">
        <a href="<?= base_url() ?>welcome/create_schedule" class="btn btn-success">Tambah</a>
        <div class="table-responsive">
            <table class="table table-bor">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Caption</th>
                        <th>Active</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($schedules as $key => $value) {
                        # code...
                    ?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><?=$value->tanggal?></td>
                            <td><?=$value->caption?></td>
                            <td><?=$value->active?></td>
                            <td>
                                <form action="" method="post">
                                    <a href="<?= base_url('welcome/edit_schedule/'.$value->id_schedule)?>" class="btn btn-primary">Edt</a>
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