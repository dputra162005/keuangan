
<div id="modal-tambah" class="modal-tambah">
    <div class="tambah-container">
      <div id="close" class="close"><i class="fa-solid fa-rectangle-xmark"></i></div>
      <h2 id="title-modal" >Tambah Transaksi</h2>
        <form id="fromtambah"  method="POST">
            @csrf
            <input type="hidden" name="_method" id="formMethod" value="POST">
            
            <div class="masukan-data">
                <label for="jenis">Jenis Transaksi</label>
                <select name="type" id="jenis">
                    <option value="">-- Pilih Jenis --</option>
                    <option value="pemasukan">Pemasukan</option>
                    <option value="pengeluaran">Pengeluaran</option>
                </select>

                <label for="kategori">Kategori</label>
                <select name="kategori" id="kategori"></select>

                <label for="jumlah">Jumlah</label>
                <input type="number" id="jumlah" name="amount" placeholder="Masukkan Jumlah">

                <label for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" name="date">

                <button id="btnModal" type="submit" class="btn-submit">Tambah</button>
            </div>
        </form>
    </div>
</div>
