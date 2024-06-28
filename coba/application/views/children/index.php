<!-- <!DOCTYPE html>
<html>
<head>
    <title>Data Anak</title>
</head>
<body>
    <h1>Data Anak</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Anak</th>
            <th>Tanggal Lahir</th>
            <th>Aksi</th>
        </tr>
        
    </table>
</body>
</html> -->
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Data Anak</h3>
        </div>
    </div>
    <div class="flash-datae" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
    <?php if ($this->session->flashdata('msg')) : ?>

    <?php endif; ?>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Anak</th>
                                            <th>Tempat/Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Berat Badan Lahir</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>