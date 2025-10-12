
<div id="modal-tambah" class="modal-tambah">
    <div class="tambah-container">
      <div id="close" class="close"><i class="fa-solid fa-rectangle-xmark"></i></div>
      <h2 id="title-modal" >Tambah Transaksi</h2>
        <form  action="">
            <div class="masukan-data">
                <label for="jenis">Jenis Transaksi</label>
                <select name="jenis" id="jenis">
                    <option value="pemasukan">Pemasukan</option>
                    <option value="pengeluaran">Pengeluaran</option>
                </select>

                <label for="kategori">Kategori</label>
                <select name="kategori" id="kategori">
                    <option value="makanan">Makanan</option>
                    <option value="transportasi">Transportasi</option>
                    <option value="hiburan">Hiburan</option>
                    <option value="belanja">Belanja</option>
                    <option value="tagihan">Tagihan</option>
                    <option value="lainnya">Lainnya</option>
                </select>

                <label for="jumlah">Jumlah</label>
                <input type="number" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah">

                <label for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal">

                <button id="btnModal" type="submit" class="btn-submit">Tambah</button>
            </div>
        </form>
    </div>
</div>
