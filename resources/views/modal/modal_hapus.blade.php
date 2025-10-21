<div id="modal-hapus" class="modal-hapus">
    <div class="hapus-container">
      <div class="hapus-content">
        <h3>delete</h3>
        <p>apa anda yakin untuk menghapus taransaksi ini?</p>
        <p>click konfirmasi jika setuju</p>
      </div>
      <div class="hapus-content-btn">
        {{-- <button id="konfirmasi Hapus" href="" >close</button> --}}
        <form id="deleteFrom" method="post">
            @csrf
            @method('DELETE')
        <button id="hapus" type="submit" >konfirmasi</button>
        </form>
      </div>
    </div>
</div>