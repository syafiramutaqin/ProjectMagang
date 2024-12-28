<!-- app/Views/obat/edit.php -->
<?= $this->extend('Layout/App') ?>

<?= $this->section('content') ?>
<h2>Edit Data Obat</h2>

<form action="<?= base_url('data-master-obat/update/' . $obat['id']) ?>" method="post" class="form-container">
    <!-- Tambahkan ini jika menggunakan PUT -->
    <input type="hidden" name="_method" value="PUT">

    <div class="form-group">
        <label for="kode_obat">Kode Obat:</label>
        <input type="text" name="kode_obat" id="kode_obat" value="<?= $obat['kode_obat'] ?>" required>
    </div>
    <div class="form-group">
        <label for="nama_golongan">Nama Golongan:</label>
        <input type="text" name="nama_golongan" id="nama_golongan" value="<?= $obat['nama_golongan'] ?>" required>
    </div>
    <div class="form-group">
        <label for="nama_obat">Nama Obat:</label>
        <input type="text" name="nama_obat" id="nama_obat" value="<?= $obat['nama_obat'] ?>" required>
    </div>
    <div class="form-group">
        <label for="barang_masuk">Barang Masuk:</label>
        <input type="number" name="barang_masuk" id="barang_masuk" value="<?= $obat['barang_masuk'] ?>" required>
    </div>
    <div class="form-group">
        <label for="barang_keluar">Barang Keluar:</label>
        <input type="number" name="barang_keluar" id="barang_keluar" value="<?= $obat['barang_keluar'] ?>" required>
    </div>
    <div class="form-group">
        <label for="stock_akhir">Stock Akhir:</label>
        <input type="number" name="stock_akhir" id="stock_akhir" value="<?= $obat['stock_akhir'] ?>" required>
    </div>
    <div class="form-group">
        <label for="target">Target:</label>
        <input type="number" name="target" id="target" value="<?= $obat['target'] ?>" required>
    </div>
    <div class="form-group">
        <label for="pic_by">PIC BY:</label>
        <input type="text" name="pic_by" id="pic_by" value="<?= $obat['pic_by'] ?>" required>
    </div>
    <div class="form-group">
        <label for="notes">Notes:</label>
        <input type="text" name="notes" id="notes" value="<?= $obat['notes'] ?>">
    </div>
    <div class="form-actions">
        <button type="submit">Update</button>
        <a href="<?= base_url('data-master-obat') ?>">Kembali</a>
    </div>
</form>

<?= $this->endSection() ?>

<!-- CSS (bisa dipindahkan ke file CSS terpisah) -->
<style>
.form-container {
    width: 60%;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.form-group input {
    width: 100%;
    padding: 8px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.form-actions {
    margin-top: 20px;
    text-align: right;
}

.form-actions button {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.form-actions button:hover {
    background-color: #45a049;
}

.form-actions a {
    padding: 10px 20px;
    font-size: 16px;
    color: #4CAF50;
    text-decoration: none;
    border: 1px solid #4CAF50;
    border-radius: 4px;
    margin-left: 10px;
}

.form-actions a:hover {
    background-color: #4CAF50;
    color: white;
}
</style>