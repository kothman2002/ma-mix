<section id="contact-section">

    <div class="contact-container">

        <div class="contact-form-box">

            <img src="assets/img/m_mix_logo.png" class="contact-logo">

            <form class="contact-form" method="POST" action="../includes/save_message.php">

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
<?php if (isset($_GET['contact']) && $_GET['contact'] === 'success'): ?>
    <div class="alert alert-success text-center">
        تم إرسال رسالتك بنجاح ✅
    </div>
<?php endif; ?>

<?php if (isset($_GET['contact']) && $_GET['contact'] === 'error'): ?>
    <div class="alert alert-danger text-center">
        حدث خطأ أثناء الإرسال ❌
    </div>
<?php endif; ?>

</section>
