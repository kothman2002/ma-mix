<section id="fields-slider-section">

    <div class="fields-slider">

        <img src="assets/img/our_feild.png" class="fields-title">

        <div class="slide">
           <img src="assets/img/last.jpg" class="slide-img" loading="lazy" decoding="async">
            <div class="field-caption">أعمال البناء / Construction</div>
        </div>

        <div class="slide">
            <img src="assets/img/Engineering_Consultancy.jpg" class="slide-img" loading="lazy" decoding="async">
            <div class="field-caption">الإستشارات الهندسية / Engineering Consultancy</div>
        </div>

        <div class="slide">
            <img src="assets/img/Material_supply.jpg" class="slide-img" loading="lazy" decoding="async">
            <div class="field-caption">توريد المواد / Material supply</div>
        </div>

        

        <div class="slide">
            <img src="assets/img/Decorations.jpg" class="slide-img" loading="lazy" decoding="async">
            <div class="field-caption">أعمال الديكور والتشطيبات / Decorations and Finishes</div>
        </div>

    </div>

    <div class="arrow arrow-left" onclick="prevSlide()">&#10094;</div>
    <div class="arrow arrow-right" onclick="nextSlide()">&#10095;</div>

</section>

<script>
let currentSlide = 0;
const slides = document.querySelectorAll(".slide");

function updateSlides() {
    slides.forEach((slide, i) => {
        slide.classList.remove("active", "prev", "next");

        if (i === currentSlide) {
            slide.classList.add("active"); 
        } else if (i === (currentSlide - 1 + slides.length) % slides.length) {
            slide.classList.add("prev");   
        } else if (i === (currentSlide + 1) % slides.length) {
            slide.classList.add("next");  
        }
    });
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    updateSlides();
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    updateSlides();
}

updateSlides();

setInterval(nextSlide, 4000);
</script>
