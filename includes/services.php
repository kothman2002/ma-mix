<section id="services">

    <div class="text-center mb-5">
        <img src="assets/img/our_services.png" style="width:350px;">
    </div>

    <div class="services-bg"></div>

    <div class="services-slider">

        <!-- المجموعة 1 -->
        <div class="services-container active">
            <div class="service-card">
                <img src="assets/img/home.jpg" class="service-img" loading="lazy">
                <div class="service-text">تجهيز المباني بالأنظمة الذكية</div>
            </div>

            <div class="service-card">
                <img src="assets/img/garden.jpg" class="service-img" loading="lazy">
                <div class="service-text">تنفيذ جميع أنواع الحدائق العامة والخاصة</div>
            </div>

            <div class="service-card">
                <img src="assets/img/services.jpg" class="service-img" loading="lazy">
                <div class="service-text">
                    المقاولات العامة للمباني<br>
                    (تصميم، إنشاء، تنفيذ، تشطيب، ترميم)
                </div>
            </div>
        </div>

        <!-- المجموعة 2 (N1, N2, N3) -->
        <div class="services-container">
            <div class="service-card">
                <img src="assets/img/N1.jpg" class="service-img" loading="lazy">
                <div class="service-text">الاستشارات الهندسية والتصميم الداخلي والخارجي</div>
            </div>

            <div class="service-card">
                <img src="assets/img/N2.jpg" class="service-img" loading="lazy">
                <div class="service-text">جميع أعمال الخرسانة والهيكل الإنشائي</div>
            </div>

            <div class="service-card">
                <img src="assets/img/N3.jpg" class="service-img" loading="lazy">
                <div class="service-text">تنفيذ أعمال الديكور الداخلية والخارجية</div>
            </div>
        </div>

    </div>

</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    let index = 0;
    const groups = document.querySelectorAll('#services .services-container');

    if (groups.length <= 1) return; 

    setInterval(function () {
        groups[index].classList.remove('active');
        index = (index + 1) % groups.length;
        groups[index].classList.add('active');
    }, 5000); 
});
</script>
