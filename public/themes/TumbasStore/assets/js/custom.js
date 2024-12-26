// Ganti dengan email dan nomor WhatsApp Anda
const emailAddress = "alfarohman160@gmail.com"; // Ganti dengan email Anda
const whatsappNumber = "6288238365649"; // Ganti dengan nomor WhatsApp Anda (format internasional, tanpa tanda +)

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("send-email").addEventListener("click", function () {
        const message = document.querySelector(".feedback-textarea").value;
        if (!message) {
            alert("Silakan isi kritik atau saran Anda sebelum mengirim.");
            return;
        }
        // Membuka email client
        window.location.href = `mailto:${emailAddress}?subject=Kritik%20dan%20Saran&body=${encodeURIComponent(message)}`;
    });

    document.getElementById("send-whatsapp").addEventListener("click", function () {
        const message = document.querySelector(".feedback-textarea").value;
        if (!message) {
            alert("Silakan isi kritik atau saran Anda sebelum mengirim.");
            return;
        }
        // Membuka WhatsApp dengan pesan
        this.href = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`;
    });
});
