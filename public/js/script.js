
const profil = document.getElementById('profile');
const dropdownMenu = document.getElementById('dropdownmenu');
const tambahTransaksi = document.getElementById('tambahtransaksi');
const modalTambahh = document.getElementById('modal-tambah');
const btnedit = document.querySelectorAll('.edit');
const close = document.getElementById('close');
const titleModal = document.getElementById('title-modal');
const btnModal = document.getElementById('btnModal')
const modalHapus = document.getElementById('modal-hapus');
const closeHapus = document.getElementById('hapus');
const btnHapus = document.querySelectorAll('.hapus');
const pop = document.getElementById('pop');




function bar() {
    profil.addEventListener('click', ()=> {
    console.log('Profile clicked');
    dropdownMenu.classList.toggle('target');
    });

    document.addEventListener('click', (e) => {
    // Jika klik di luar dropdown & tombol profil
    if (!dropdownMenu.contains(e.target) && !profil.contains(e.target)) {
        dropdownMenu.classList.remove('target');
    }
    });
}

function modalTambah() {
    tambahTransaksi.addEventListener('click', ()=> {
        titleModal.textContent = "tambah transaksi";
        btnModal.textContent = "kirim";
        modalTambahh.style.display = "flex"
    })

    btnedit.forEach(btn => {
        btn.addEventListener('click', ()=> {
            titleModal.textContent = "edit transaksi";
            btnModal.textContent = "perbarui";
            modalTambahh.style.display = "flex";
        })
    })



    close.addEventListener('click', ()=> {
        modalTambahh.style.display = "none";
    })

    window.onclick = function(e) {
        if (e.target === modalTambahh) {
            modalTambahh.style.display = "none";
        }
    }
};

function hapus() {
    btnHapus.forEach(b => {
        b.addEventListener('click', ()=> {
            modalHapus.style.display = "flex";
        })
    })

    window.addEventListener('click', function(e) {
        if (e.target === modalHapus) {
            modalHapus.style.display = "none";
        }
    })

    
}


    window.addEventListener('load', ()=> {
        console.log("Popup tampil!");

        
      // tampilkan popup
            pop.classList.add('tampil');

            // hilangkan setelah 5 detik
            setTimeout(() => {
                pop.classList.remove('tampil');
            }, 5000);
    }); 




console.log("Popup tampil!");
bar();
modalTambah();
hapus();



