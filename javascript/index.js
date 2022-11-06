// alert box
function validateForm() {
    var fields = ["email", "message"]

    var i, l = fields.length;
    var fieldname;
    for (i = 0; i < l; i++) {
        fieldname = fields[i];
        if (document.forms["contact"][fieldname].value === "") {
            alert(fieldname + " tidak boleh kosong");
            return false;
        }
    }
    alert('Terima kasih, informasi selanjutnya akan dikirim melalui email');
    return true;
}

// addEventListener dan manipulasi DOM 1, hilangkan/munculkan elemen
const showMore = document.getElementById('show-more');
showMore.addEventListener('click', () => {
    console.log('clicked')
    const contentsItem = document.getElementsByClassName('contents-item');
    for (let i = 2; i < contentsItem.length; i++) {
        // jika hidden, munculkan dan ganti tulisan menjadi "lebih sedikit"
        if (contentsItem[i].classList.contains('hidden')) {
            contentsItem[i].classList.remove('hidden');
            showMore.innerHTML = "Lebih sedikit";
            // jika tidak hidden, hidden kan
        } else {
            contentsItem[i].classList.add('hidden');
            showMore.innerHTML = "Lebih banyak";
        }
    }
})

// manipulasi DOM 2 ganti warna tulisan "Sekarang" waktu di klik
const sekarang = document.getElementById('sekarang');
sekarang.addEventListener('click', () => {
    if (sekarang.style.color != 'black') {
        sekarang.style.color = 'black';
    } else {
        sekarang.style.color = '#f87474'
    }
});