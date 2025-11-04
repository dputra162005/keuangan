// const btnEditMobile = document.getElementById("btnEditMobile");
// const tambahContainer = document.querySelector(".tambah-container");


// function mobileEdit() {
//     btnEditMobile.addEventListener('click', async function() {
//     const jenis = document.getElementById('jenis');
//     const ketegori = document.getElementById("kategori");
//     const jumlah = document.getElementById('jumlah');
//     const tanggal = document.getElementById('tanggal');

//     console.log("ini media edit");
//     modalTambahh.style.display = "flex"
//     tambahContainer.style.width = "90%"
//     const id = this.getAttribute("data-id")
//     console.log(id);
//     const res = await fetch(`/transaction/${id}`);
//     const data = await res.json();
//     console.log(data);
//     jenis.value = data.type
//     ketegori.value = data.kategori
//     jumlah.value = data.amount
//     tanggal.value = data.date

    
//     });
// }

// mobileEdit();


function modalTambahMobile() {

        
        const jenisMobile = document.getElementById('jenis-mobile');
        const kategoriMobile = document.getElementById('kategori-mobile');

        
        

        jenisMobile.addEventListener("change", function() {
            const data = jenisMobile.value;
            console.log(data);

            const kategoriData = {
            pemasukan : ['Gaji', 'Bonus', 'Hadiah', 'Investasi'],
            pengeluaran : ['Makan', 'Transportasi', 'Belanja', 'Tagihan']
            }

            kategoriMobile.innerHTML = '<option value="">-- Pilih Kategori --</option>';

            if (data && kategoriData[data]) {
                kategoriData[data].forEach( function(ket) {
                    var option = document.createElement("option");
                    option.value = ket;
                    option.textContent = ket;

                    kategoriMobile.appendChild(option);
                })
            }

        })
    
}


function hapus() {
    btnHapus = document.querySelectorAll(".hapus")
    btnHapus.forEach(b => {
        b.addEventListener('click', ()=> {
            console.log("hahahha");
            modalHapus.style.display = "flex";
            const id = b.getAttribute('data-id');
            console.log(id)
            deleteFrom.action = `/transaction/delete/${id}`;
        })
    })


    window.addEventListener('click', function(e) {
        if (e.target === modalHapus) {
            modalHapus.style.display = "none";
        }
    })

};

hapus();
modalTambahMobile();