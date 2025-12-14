<?php
session_start();
require_once __DIR__ . "/db.php"; 

if (!isset($_SESSION['visited'])) {
    $_SESSION['visited'] = true;
    $conn->query("INSERT INTO visits (visited_at) VALUES (NOW())");
}
?>


<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>M A MIX</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
       html {
            scroll-behavior: smooth;
       }

       body {
            margin: 0;
            padding: 0;
            font-family: 'Cairo', sans-serif;
            overflow-x: hidden;
            background-color: #fff;
       }

        /* ======================= NAVBAR ======================= */
        .top-bar {
            position: fixed;
            top: 0;
            width: 100%;
            height: 90px;
            background: linear-gradient(to right, #43a7cf, #2f4a80);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 60px;
            z-index: 9999;
            box-shadow: 0px 3px 10px rgba(0,0,0,0.15);

        }
                    .menu-toggle {
    display: none;
}

        .nav-links { display: flex; gap: 45px; }

        .nav-links a {
            color: #ffffff;
            font-size: 22px;
            font-weight: 600;
            text-decoration: none;
        }

        .logo { width: 172px; }

        /* ======================= HERO ======================= */
        .hero {
            width: 100%;
            height: calc(100vh - 90px);
            background-size: cover;
            background-position: center center;
            position: relative;
            margin-top: 90px;
            opacity: 1;
            transition: opacity 1.8s ease-in-out;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.30);
        }

        .hero-title {
            position: absolute;
            bottom: 50%;
            right: 1%;
        }

        .hero-title img {
            width: 600px;
        }

        .floating-icons {
            position: absolute;
            bottom: 40px;
            left: 35px;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .floating-icons img {
            width: 110px;
            cursor: pointer;
            transition: .2s;
        }

        /* ======================= ABOUT ======================= */
        #about {
            width: 100%;
          background-image: url('assets/img/our.webp');
            background-size: cover;
            background-position: center;
            padding: 120px 0 180px 0;
            scroll-margin-top: 90px;
        }

        .about-container {
            width: 80%;
            margin: auto;
            position: relative;
        }

        .about-title-left {
            position: absolute;
            top: 0;
            left: 0;
            color: #b4d0e9;
            font-size: 55px;
            font-weight: 700;
            line-height: 60px;
        }

        .about-title-left span {
            font-size: 42px;
            font-weight: 400;
        }

        .about-content-box {
            width: 60%;
            margin-right: auto;
            text-align: right;
        }

        .about-heading {
            background: linear-gradient(to right, #43a7cf, #2f4a80);
            color:white;
            padding:10px 25px;
            font-size:26px;
            font-weight:700;
            border-radius:6px;
            display:inline-block;
            margin-bottom:25px;
        }

        .about-text {
            font-size:20px;
            line-height:38px;
            color:#333;
            font-weight:400;
        }

 /* ======================= SERVICES ======================= */

#services {
    padding: 120px 0;
    position: relative;
    min-height: 600px;
    background-image: url('assets/img/backk.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.services-bg {
    width: 100%;
    height: 320px;
    background: linear-gradient(
        to right,
        rgba(60,162,204,0.80),
        rgba(44,69,122,0.80)
    );
    position: absolute;
    bottom: 0;
    left: 0;
    z-index: 1;
    border-radius: 120px 120px 0 0;
}

.services-slider {
    position: relative;
    height: 555px;
    width: 100%;
    z-index: 2;
}

.services-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;

    display: flex;
    justify-content: center;
    gap: 60px;

    visibility: hidden;
    pointer-events: none;

    opacity: 0;
    transform: translateY(40px);

    transition: opacity .6s ease, transform .6s ease;
}

.services-container.active {
    visibility: visible;
    pointer-events: auto;

    opacity: 1;
    transform: translateY(0);
}

/* ======================= SERVICE CARD ======================= */

.service-card {
    width: 330px;
    background: white;
    border-radius: 40px;
    padding-bottom: 25px;

    box-shadow: 0 6px 15px rgba(0,0,0,0.15);
    text-align: center;
    overflow: hidden;

    border: 4px solid #cde4ff;

    will-change: transform;
}

.service-img {
    width: 100%;
    height: 240px;
    object-fit: cover;
    border-bottom: 4px solid #b5d4ff;
    display: block;
}

.service-text {
    font-size: 20px;
    margin-top: 18px;
    line-height: 32px;
    font-weight: 600;
    color: #333;
}



       /* ======================= FIELDS SLIDER ======================= */
#fields-slider-section {
    margin-top: 0 !important;
    padding-top: 0 !important;
    scroll-margin-top: 90px;
    position: relative;
}

.fields-slider {
    width: 100%;
    height: 790px;
    position: relative;
    overflow: hidden;
}

.fields-title {
    position: absolute;
    top: 30px;
    right: 50px;
    width: 360px;
    z-index: 50;
}

/* ===== SLIDE ===== */
.slide {
    width: 100%;
    height: 100%;
    position: absolute;
    inset: 0;
    opacity: 0;
    transform: translateX(100%);
    transition: transform 0.8s ease, opacity 0.8s ease;
    will-change: transform, opacity;
}

.slide.active {
    transform: translateX(0);
    opacity: 1;
    z-index: 3;
}

.slide.prev {
    transform: translateX(-100%);
    opacity: 0;
    z-index: 2;
}

.slide.next {
    transform: translateX(100%);
    opacity: 0;
    z-index: 2;
}

.slide-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.field-caption {
    position: absolute;
    bottom: 60px;
    right: 40px;
    background: rgba(30,70,130,0.85);
    padding: 12px 30px;
    border-right: 12px solid #34b0e4;
    border-radius: 4px;
    font-size: 36px;
    color: white;
    font-weight: 700;
    letter-spacing: .5px;
}

/*
        .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background: rgba(0,0,0,0.25);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 34px;
            color: white;
            cursor: pointer;
            transition: .3s;
            z-index: 60;
        }

        .arrow:hover {
            background: rgba(0,0,0,0.40);
        }

        .arrow-left { right: 25px; }
        .arrow-right { left: 25px; }
*/
        /* ============================
           WHY US SECTION 
        ============================ */
        #why-us-section {
            position: relative;
            width: 100%;
            height: 800px;
            display: flex;
            align-items: center;
            justify-content: flex-end; 
            padding: 0 80px;
            direction: ltr;
            overflow: hidden;
            scroll-margin-top: 90px;
            background-image: url('assets/img/why_us.png');
            background-size: cover;        
            background-position: bottom center; 
            background-repeat: no-repeat;
        }

        #why-us-section::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to left, rgba(44,84,123,0.9), rgba(63,122,167,0.85));
            z-index: 1;
        }

        #why-us-section .why-content {
             width: 55%;
    max-width: 900px;
    z-index: 2;
    text-align: right;
        }

        #why-us-section h2 {
            font-size: 50px;
            font-weight: 800;
            margin-bottom: 20px;
            color: #ffffff;
        }

        #why-us-section p {
            font-size: 24px;
            line-height: 2.1;
            font-weight: 400;
            color: #ffffff;
        }

        /* ===============================
              PARTNERS SECTION
        =============================== */
        #partners-section {
            background: #ffffff;
            padding: 80px 0;
            text-align: center;
            scroll-margin-top: 90px;
        }

        .partners-container {
            width: 85%;
            margin: auto;
        }

        .partners-title {
            font-size: 40px;
            font-weight: 800;
            margin-bottom: 50px;
            color: #2c547b;
            position: relative;
        }

        .partners-title::after {
            content: "";
            width: 80px;
            height: 4px;
            background: #3f7aa7;
            position: absolute;
            bottom: -15px;
            right: 50%;
            transform: translateX(50%);
            border-radius: 5px;
        }

        .partners-row {
            display: flex;
            justify-content: center;
            gap: 150px;
            margin-bottom: 60px;
            flex-wrap: wrap;
        }

        .partners-row img {
            width: 150px;
            height: auto;
            opacity: 0.85;
            transition: 0.3s ease;
            filter: grayscale(40%);
        }

        .partners-row img:hover {
            opacity: 1;
            filter: grayscale(0%);
            transform: scale(1.07);
        }

        /* ======================
           CONTACT SECTION
        ====================== */
        #contact-section {
            width: 100%;
            min-height: 900px;
            background-image: url('assets/img/ack_con.png');
            background-size: cover;
            background-position: center;
            padding: 60px 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .contact-container {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .contact-form-box {
            width: 450px;
            background: linear-gradient(135deg, #2c547b, #3f7aa7);
            padding: 40px;
            border-radius: 40px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .contact-logo {
            width: 120px;
            margin-bottom: 25px;
        }

        .contact-form .input-group {
            position: relative;
            margin-bottom: 25px;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 18px;
            border-radius: 25px;
            border: none;
            outline: none;
            background: #ffffff;
            font-size: 16px;
        }

        .contact-form textarea {
            height: 120px;
            resize: none;
        }

        .contact-form .input-group span {
            position: absolute;
            right: 20px;
            top: 18px;
            color: #677;
            font-size: 14px;
            pointer-events: none;
        }

        .send-btn {
            width: 160px;
            padding: 14px 0;
            margin-top: 10px;
            border-radius: 30px;
            border: 2px solid #fff;
            background: transparent;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s;
        }

        .send-btn:hover {
            background: #fff;
            color: #2c547b;
        }

        /* ============================
                FOOTER
        ============================ */
        #footer {
            width: 100%;
            background: linear-gradient(to right, #2b4c71, #3f7aa7);
            color: #fff;
            padding: 70px 0 20px;
            margin-top: 80px;
        }

        .footer-container {
            width: 85%;
            margin: auto;
            display: flex;
            justify-content: space-between;
            gap: 40px;
            flex-wrap: wrap;
        }

        .footer-col {
            width: 30%;
            min-width: 250px;
        }

        .footer-logo {
            width: 120px;
            margin-bottom: 20px;
        }

        .footer-col h3 {
            font-size: 22px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .footer-col p,
        .footer-col li {
            font-size: 15px;
            line-height: 1.8;
        }

        .footer-col ul {
            list-style: none;
            padding: 0;
        }

        .footer-col ul li {
            margin-bottom: 8px;
        }

        .footer-col ul li a {
            color: #fff;
            text-decoration: none;
            transition: 0.3s;
        }

        .footer-col ul li a:hover {
            color: #cfe7ff;
        }

        .footer-bottom {
            text-align: center;
            padding: 15px;
            border-top: 1px solid #ffffff44;
            margin-top: 30px;
            font-size: 14px;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .footer-container {
                flex-direction: column;
                text-align: center;
            }

            .footer-col {
                width: 100%;
            }

            .footer-social img {
                margin: 0 5px;
            }
        }

    </style>
        <link rel="stylesheet" href="assets/css/mobile.css">

</head>

<body>
