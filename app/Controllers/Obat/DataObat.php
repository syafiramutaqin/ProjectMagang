<?php
namespace App\Controllers\Obat;

use App\Controllers\BaseController;
use App\Models\ObatModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DataObat extends BaseController
{
    public function index()
    {
        $model = new ObatModel();
        $obatList = $model->findAll(); // Ambil semua data obat
    
        // Siapkan data untuk grafik
        $labels = [];
        $barang_masuk = [];
        $barang_keluar = [];
        $target = [];
        $stok_akhir = [];
    
        foreach ($obatList as $obat) {
            $labels[] = $obat['nama_obat'];       // Menyimpan nama obat
            $barang_masuk[] = $obat['barang_masuk']; // Menyimpan jumlah barang masuk
            $barang_keluar[] = $obat['barang_keluar']; // Menyimpan jumlah barang keluar
            $target[] = $obat['target'];         // Menyimpan target
            $stok_akhir[] = $obat['stock_akhir']; // Menyimpan stock akhir
        }
    
        // Kirimkan data ke view
        return view('dataobat/home', [
            'obatList' => $obatList,
            'labels' => $labels,
            'barang_masuk' => $barang_masuk,
            'barang_keluar' => $barang_keluar,
            'target' => $target,
            'stok_akhir' => $stok_akhir
        ]);
    }
    
    
    
    public function create()
    {
        return view('dataobat/data_obat/create');
    }

    public function save()
{
    $model = new ObatModel();
    $data = [
        'kode_obat'     => $this->request->getPost('kode_obat'),
        'nama_golongan' => $this->request->getPost('nama_golongan'),
        'nama_obat'     => $this->request->getPost('nama_obat'),
        'barang_masuk'  => $this->request->getPost('barang_masuk'),
        'barang_keluar' => $this->request->getPost('barang_keluar'),
        'stock_akhir'   => $this->request->getPost('stock_akhir'),
        'target'        => $this->request->getPost('target'),
        'pic_by'        => $this->request->getPost('pic_by'),
        'notes'         => $this->request->getPost('notes'),
    ];
    $model->save($data);
    return redirect()->to('/data-master-obat');
}


    public function edit($id)
    {
        $model = new ObatModel();
        $data['obat'] = $model->find($id);
        return view('dataobat/data_obat/edit', $data);
    }

    public function update($id)
    {
        $model = new ObatModel();
        
        // Validasi input (sesuaikan dengan kebutuhan)
        $data = [
            'kode_obat'          => $this->request->getPost('kode_obat'),
            'nama_golongan'      => $this->request->getPost('nama_golongan'),
            'nama_obat'          => $this->request->getPost('nama_obat'),
            'barang_masuk'       => $this->request->getPost('barang_masuk'),
            'barang_keluar'      => $this->request->getPost('barang_keluar'),
            'stock_akhir'        => $this->request->getPost('stock_akhir'),
            'target'             => $this->request->getPost('target'),
            'pic_by'             => $this->request->getPost('pic_by'),
            'notes'              => $this->request->getPost('notes'),
        ];
    
        // Memperbarui data berdasarkan ID
        $model->update($id, $data);
        
        // Setelah update, redirect ke halaman data obat
        return redirect()->to('/data-master-obat');
    }
    

    public function hapus($id)
    {
        $model = new ObatModel();
    
        // Cek apakah ID obat valid
        if ($model->find($id)) {
            // Hapus data berdasarkan ID
            $model->delete($id);
            
            // Redirect setelah penghapusan
            return redirect()->to('/data-master-obat')->with('success', 'Data berhasil dihapus.');
        } else {
            // Jika ID tidak ditemukan, tampilkan pesan error atau redirect
            return redirect()->to('/data-master-obat')->with('error', 'Data tidak ditemukan.');
        }
    }
    
    

    public function exportExcel()
    {
        $model = new ObatModel();
        $data = $model->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No')
              ->setCellValue('B1', 'Nama Obat')
              ->setCellValue('C1', 'Kategori')
              ->setCellValue('D1', 'Harga')
              ->setCellValue('E1', 'Stok')
              ->setCellValue('F1', 'Tanggal Kadaluarsa');

        $row = 2;
        foreach ($data as $key => $obat) {
            $sheet->setCellValue('A' . $row, $key + 1)
                  ->setCellValue('B' . $row, $obat['nama_obat'])
                  ->setCellValue('C' . $row, $obat['kategori'])
                  ->setCellValue('D' . $row, $obat['harga'])
                  ->setCellValue('E' . $row, $obat['stok'])
                  ->setCellValue('F' . $row, $obat['tanggal_kadaluarsa']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Data_Obat_' . date('YmdHis') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }



}