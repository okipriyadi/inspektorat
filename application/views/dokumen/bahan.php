<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card" style="margin-bottom: 13px;">
                <div class="card-header">
                    <h4><?= $judul ?></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php
                        foreach ($bahan as $key => $value) {
                            # code...
                            if ($value->kategori == 0) {
                                tutorial($value);
                            } else {
                                bahan($value,$key);
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
function tutorial($value)
{
?>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h4><?= $value->nama ?></h4>
                    </div>
                    <div class="col-sm-4 pull-right">
                        <?= date('d F Y', strtotime($value->created_at)) ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <iframe width="100%" height="315" src="<?= $value->link ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
function bahan($value,$key)
{
?>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h4><?= $value->nama ?></h4>
                    </div>
                    <div class="col-sm-4 pull-right">
                        <?= date('d F Y', strtotime($value->created_at)) ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <a href="<?= $value->link ?>"><?= $key + 1 ?>. <?= $value->link ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
