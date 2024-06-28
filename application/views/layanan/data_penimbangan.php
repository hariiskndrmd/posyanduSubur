<script>
        function printTable() {
            window.print();
        }
    </script>
<style>
    @media print {
            @page {
                size: landscape;
            }
            body * {
                visibility: hidden;
            }
            #printableTable, #printableTable * {
                visibility: visible;
            }
            #printableTable {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
</style>
<div class="right_col" role="main">

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h3>Daftar Penimbangan Anak Yang Telah Dilakukan</h3>
                    <div class="clearfix"></div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button onclick="printTable()" class="btn btn-outline-warning">Print Table</button>
                </div>
                <?php

                ?>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="printableTable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Anak</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Nama Ibu</th>
                                            <th>Tanggal Penimbangan</th>
                                            <th>Usia Anak</th>
                                            <th>Berat Badan</th>
                                            <th>Tinggi Badan</th>
                                            <th>Deteksi</th>
                                            <th>Keterangan</th>
                                            <th>Dilakukan Oleh</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($row as $n) :
                                            $a = $this->anak_model->edit('anak', array('id_anak' => $n['anak_id']))->row_array();
                                            $b = $this->anak_model->edit('ibu', array('id_ibu' => $n['ibu_id']))->row_array();
                                            $c = $this->anak_model->edit('user', array('id_users' => $n['created_by']))->row_array();
                                        ?>
                                            <tr>
                                                <th scope="row">
                                                    <center><?= $i; ?></center>
                                                </th>
                                                <td><?= $a['nama_anak']; ?></td>
                                                <td><?= $n['tgl_lahir']; ?></td>
                                                <td><?= $n['jenis_kelamin']; ?></td>
                                                <td><?= $b['nama_ibu']; ?></td>
                                                <td><?= $n['tgl_skrng']; ?></td>
                                                <td><?= $n['usia']; ?>&nbsp;Bulan</td>
                                                <td><?= $n['bb']; ?></td>
                                                <td><?= $n['tb']; ?></td>
                                                <td><?= $n['deteksi']; ?></td>
                                                <td><?= $n['ket']; ?></td>
                                                <td><?= $c['name']; ?></td>

                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
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
