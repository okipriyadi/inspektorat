<div class="card">
    <div class="card-body">
        <form action="<?=base_url('welcome/edit_news/'.$id)?>" method="post" enctype="multipart/form-data">
            <?php include("_form.php");?>
        </form>
    </div>
</div>