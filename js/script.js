anime({
  targets: "#animated-text",
  translateY: [-100, 0], // dari -100px ke posisi normal
  opacity: [0, 1], // dari transparan ke terlihat
  duration: 2000,
  easing: "easeOutExpo",
});

anime({
  targets: "#animated-text",
  color: ["#FFF", "#FF0", "#FFF"], // Mengubah warna dari putih ke kuning dan kembali ke putih
  duration: 3000,
  easing: "easeInOutSine",
  loop: true,
});
gsap.from(".hero-section", {
  duration: 1.5,
  y: -100,
  opacity: 0,
  ease: "power2.out",
});

gsap.from(".btn-info", {
  duration: 1,
  scale: 0,
  ease: "bounce.out",
  delay: 1,
});

//
document.addEventListener("DOMContentLoaded", function () {
  gsap.registerPlugin(ScrollTrigger);

  // Animasi untuk judul dan paragraf di bagian Tentang Kami
  gsap.from("#tentang-kami h2, #tentang-kami p", {
    scrollTrigger: {
      trigger: "#tentang-kami",
      start: "top 80%", // Mulai animasi ketika bagian atas elemen mencapai 80% dari viewport
      toggleActions: "play none none reverse", // Mainkan animasi saat scroll ke bawah dan balikkan saat scroll ke atas
    },
    opacity: 0,
    y: 50, // Menggerakkan elemen ke bawah 50px
    duration: 1, // Durasi animasi 1 detik
    stagger: 0.2, // Jeda animasi antara elemen
  });
});

//

//
document.addEventListener("DOMContentLoaded", function () {
  // Pilih semua elemen card dalam bagian kegiatan dan berita
  const cards = document.querySelectorAll("#kegiatan-berita .card");

  // Inisialisasi GSAP ScrollTrigger
  gsap.registerPlugin(ScrollTrigger);

  // Loop melalui setiap card dan buat animasi
  cards.forEach((card) => {
    gsap.from(card, {
      scrollTrigger: {
        trigger: card, // elemen yang menjadi trigger
        start: "top 80%", // memulai animasi saat card berada di 80% dari viewport
        toggleActions: "play none none reverse", // aksi animasi
      },
      opacity: 0, // memulai dari transparan
      y: 50, // memulai dari posisi lebih rendah
      duration: 1.5, // durasi animasi
    });
  });
});
