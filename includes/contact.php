<section id="contact-section">

    <div class="contact-container">
        <div class="contact-form-box">

            <!-- الشعار -->
            <img src="/assets/img/m_mix_logo.png" class="contact-logo" alt="MA MIX Logo">

            <!-- رسالة الإرسال -->
            <div id="formMessage" style="margin-bottom:15px; font-weight:600;"></div>

            <!-- الفورم -->
            <form class="contact-form" id="contactForm">

                <div class="input-group">
                    <input type="text" name="name" placeholder="Name" required>
                </div>

                <div class="input-group">
                    <input type="text" name="phone" placeholder="Phone Number" required>
                </div>

                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>

                <div class="input-group">
                    <textarea name="message" placeholder="Keep message" required></textarea>
                </div>

                <button type="submit" class="send-btn">Send</button>

            </form>

        </div>
    </div>

</section>

<!-- AJAX SCRIPT -->
<script>
document.getElementById("contactForm").addEventListener("submit", function(e) {
    e.preventDefault(); // منع إعادة التحميل

    const form = this;
    const formData = new FormData(form);
    const msgBox = document.getElementById("formMessage");
    const btn = form.querySelector(".send-btn");

    btn.disabled = true;
    btn.innerText = "Sending...";

    fetch("/includes/save_message.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === "success") {
            msgBox.innerHTML = "تم إرسال رسالتك بنجاح ✅";
            msgBox.style.color = "#00ffcc";
            form.reset(); // تفريغ الفورم
        } else {
            msgBox.innerHTML = "حدث خطأ أثناء الإرسال ❌";
            msgBox.style.color = "#ffdddd";
        }
    })
    .catch(() => {
        msgBox.innerHTML = "خطأ في الاتصال بالسيرفر ❌";
        msgBox.style.color = "#ffdddd";
    })
    .finally(() => {
        btn.disabled = false;
        btn.innerText = "Send";
    });
});
</script>
