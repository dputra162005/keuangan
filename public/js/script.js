
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
const pop = document.getElementById('pop');
const konfirmasiHapus = document.getElementById("konfirmasiHapus");
const deleteFrom = document.getElementById("deleteFrom");
const tambahFrom = document.getElementById("fromtambah");
const formMethod = document.getElementById("formMethod");


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

        const jenis = document.getElementById('jenis');
        const kategori = document.getElementById('kategori');

        titleModal.textContent = "tambah transaksi";
        btnModal.textContent = "kirim";
        modalTambahh.style.display = "flex"
        tambahFrom.action = `/transaction/create`;

        jenis.addEventListener("change", function() {
            const data = jenis.value;
            console.log(data);

            const kategoriData = {
            pemasukan : ['Gaji', 'Bonus', 'Hadiah', 'Investasi'],
            pengeluaran : ['Makan', 'Transportasi', 'Belanja', 'Tagihan']
            }

            kategori.innerHTML = '<option value="">-- Pilih Kategori --</option>';

            if (data && kategoriData[data]) {
                kategoriData[data].forEach( function(ket) {
                    var option = document.createElement("option");
                    option.value = ket;
                    option.textContent = ket;

                    kategori.appendChild(option);
                })
            }

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
    

    btnedit.forEach(btn => {
        const jenis = document.getElementById('jenis');
        const ketegori = document.getElementById("kategori");
        const jumlah = document.getElementById('jumlah');
        const tanggal = document.getElementById('tanggal');
        btn.addEventListener('click', async function() {
            titleModal.textContent = "edit transaksi";
            btnModal.textContent = "perbarui";
            modalTambahh.style.display = "flex";
            const id = btn.getAttribute('data-id');
            console.log(id);
            const res = await fetch(`/transaction/${id}`);
            const data = await res.json();
            console.log(data);
            jenis.value = data.type
            //kategori.value = data.kategori
            jumlah.value = data.amount
            tanggal.value = data.date

            const kategoriData = {
            pemasukan : ['Gaji', 'Bonus', 'Hadiah', 'Investasi'],
            pengeluaran : ['Makan', 'Transportasi', 'Belanja', 'Tagihan']
            }

            // let jenis = this.value;
            // console.log(jenis);
            ketegori.innerHTML = '<option value="">-- Pilih Kategori --</option>';

            if ( data.type && kategoriData[data.type]) {
                kategoriData[data.type].forEach(function(ket, index) {
                    let option = document.createElement("option");
                    option.value = ket.toLowerCase();
                    option.textContent = ket;
                    ketegori.appendChild(option);
                })

                const dataKategori = ketegori.value = data.kategori;

                console.log(dataKategori);
                let id = data.id;
                formMethod.value = 'PUT';
                tambahFrom.action = `/transaction/update/${id}`

                
            }

            
        })
    })

    const btnEditMobile = document.getElementById("btnEditMobile");
    const tambahContainer = document.querySelector(".tambah-container");

    btnEditMobile.addEventListener("click", async function() {
        console.log("ini media edit");
        modalTambahh.style.display = "flex"
        tambahContainer.style.width = "90%"
        const id = this.getAttribute("data-id")
        console.log(id);

        const res = await fetch(`/transaction/${id}`);
            const data = await res.json();
            console.log(data);
            jenis.value = data.type
            //kategori.value = data.kategori
            jumlah.value = data.amount
            tanggal.value = data.date

            const kategoriData = {
            pemasukan : ['Gaji', 'Bonus', 'Hadiah', 'Investasi'],
            pengeluaran : ['Makan', 'Transportasi', 'Belanja', 'Tagihan']
            }

            // let jenis = this.value;
            // console.log(jenis);
            ketegori.innerHTML = '<option value="">-- Pilih Kategori --</option>';

            if ( data.type && kategoriData[data.type]) {
                kategoriData[data.type].forEach(function(ket, index) {
                    let option = document.createElement("option");
                    option.value = ket.toLowerCase();
                    option.textContent = ket;
                    ketegori.appendChild(option);
                })

                const dataKategori = ketegori.value = data.kategori;

                console.log(dataKategori);
                let id = data.id;
                formMethod.value = 'PUT';
                tambahFrom.action = `/transaction/update/${id}`
            }

    })




    
};




    window.addEventListener('load', ()=> {
        console.log("Popup tampil!");

        
      // tampilkan popup
            pop.classList.add('tampil');

            // hilangkan setelah 5 detik
            setTimeout(() => {
                pop.classList.remove('tampil');
            }, 5000);
    }); 

    const jenis = document.getElementById("jenis");
    const ketegori = document.getElementById("kategori");

    function tambahproduk() {
        const kategoriData = {
            pemasukan : ['Gaji', 'Bonus', 'Hadiah', 'Investasi'],
            pengeluaran : ['Makan', 'Transportasi', 'Belanja', 'Tagihan']
        }

        

        jenis.addEventListener('change', function() {
            let jenis = this.value;
            console.log(jenis);
            ketegori.innerHTML = '<option value="">-- Pilih Kategori --</option>';

            if (jenis && kategoriData[jenis]) {
                kategoriData[jenis].forEach(function(ket) {
                    let option = document.createElement("option");
                    option.value = ket.toLowerCase();
                    option.textContent = ket;
                    ketegori.appendChild(option);
                })
            }
        })
    };

    
bar();
modalTambah();
hapus();
tambahproduk();
tambahProdukMobile();





