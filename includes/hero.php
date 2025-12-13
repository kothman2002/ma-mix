<div class="hero">

    <div class="hero-overlay"></div>

    <div class="hero-title">
<link rel="preload" as="image" href="assets/img/idea.png">
    </div>

    <div class="floating-icons">
        <img src="assets/img/whatsapp.png" onclick="location.href='https://wa.me/+966597579663'">
        <img src="assets/img/phone.png" onclick="location.href='tel:+966597579663'">
    </div>

</div>

<script>
    const heroImages = [
        'assets/img/hero.png',
        'assets/img/hero2.jpeg',
        'assets/img/hero3.jpeg',
        'assets/img/hero4.jpg'
    ];

    let heroIndex = 0;
    const heroDiv = document.querySelector('.hero');

    heroDiv.style.backgroundImage = `url('${heroImages[heroIndex]}')`;

    function changeHeroImage() {
        heroDiv.style.opacity = 0;

        setTimeout(() => {
            heroIndex = (heroIndex + 1) % heroImages.length;
            heroDiv.style.backgroundImage = `url('${heroImages[heroIndex]}')`;
            heroDiv.style.opacity = 1;
        }, 1400);
    }

    setTimeout(() => {
        changeHeroImage();
        setInterval(changeHeroImage, 5000);
    }, 5000);
</script>
