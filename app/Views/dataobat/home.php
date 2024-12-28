<?= $this->extend('Layout/App') ?>

<?= $this->section('content') ?>


<h1 class="h3 mb-0 text-gray-800">DATA MASTER OBAT</h1>

<div class="mb-3 d-flex" style="gap: 10px;">
    <a href="<?= base_url('data-master-obat/create'); ?>" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i> Tambah Data
    </a>
    <a href="<?= base_url('data-master-obat/export-excel'); ?>" class="btn btn-success btn-sm">
        <i class="fas fa-file-excel"></i> Export Excel
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Data Obat</h6>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Obat</th>
                    <th>Nama Golongan</th>
                    <th>Nama Obat</th>
                    <th>Barang Masuk</th>
                    <th>Barang Keluar</th>
                    <th>Stock Akhir</th>
                    <th>Target</th>
                    <th>PIC BY</th>
                    <th>Notes</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($obatList as $obat): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $obat['kode_obat'] ?></td>
                    <td><?= $obat['nama_golongan'] ?></td>
                    <td><?= $obat['nama_obat'] ?></td>
                    <td><?= $obat['barang_masuk'] ?></td>
                    <td><?= $obat['barang_keluar'] ?></td>
                    <td><?= $obat['stock_akhir'] ?></td>
                    <td><?= $obat['target'] ?></td>
                    <td><?= $obat['pic_by'] ?></td>
                    <td><?= $obat['notes'] ?></td>
                    <td>
                        <a href="<?= base_url('data-master-obat/edit/' . $obat['id']) ?>"
                            class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= base_url('data-master-obat/hapus/' . $obat['id']) ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('Hapus data?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h3>Grafik Data Obat</h3>

        <canvas id="grafikObat" width="250" height="75"></canvas>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
        var ctx = document.getElementById('grafikObat').getContext('2d');
        var grafikObat = new Chart(ctx, {
            type: 'bar', // Jenis grafik batang
            data: {
                labels: <?= json_encode($labels) ?>, // Nama obat
                datasets: [{
                    label: 'Barang Masuk',
                    data: <?= json_encode($barang_masuk) ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }, {
                    label: 'Barang Keluar',
                    data: <?= json_encode($barang_keluar) ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }, {
                    label: 'Target',
                    data: <?= json_encode($target) ?>,
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }, {
                    label: 'Stok Akhir',
                    data: <?= json_encode($stok_akhir) ?>,
                    backgroundColor: 'rgba(255, 159, 64, 0.2)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        </script>

        <?= $this->endSection() ?>