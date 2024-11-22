function formatRupiah(input) {
    let angka = input.value.replace(/[^,\d]/g, "").toString();
    let split = angka.split(",");
    let sisa = split[0].length % 3;
    let rupiah = split[0].substr(0, sisa);
    let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        let separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    input.value = "Rp. " + (rupiah ? rupiah : "") + (split[1] ? "," + split[1] : "");
}
