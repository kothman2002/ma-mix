<section id="services-section">

    <!-- النصف اليسار: الصورة -->
    <div class="left-image"></div>

    <!-- النصف اليمين: النصوص -->
    <div class="right-content">

<h2 class="title-box">
    ماذا نقدّم في شركتنا <span>إم إي مكس</span>
</h2>

        <p class="desc">
            نحرص في كل مشروع نعمل عليه على تقديم تجربة شاملة تتضمّن التفكير الاستراتيجي،
            التخطيط الدقيق، التنفيذ الاحترافي، والمتابعة المستمرة حتى لحظة التسليم،
            مع تقديم دعم مستمر لما بعد ذلك.
        </p>

        <ul class="services-list">
            <li>
                
                <div class="text">
                    <strong>أولاً: الإنشاءات العامة والمشاريع الكبرى</strong>
                    <p>ننفذ أعمال الإنشاءات للمشاريع السكنية، التجارية، الإدارية، والصناعية بقدرة عالية على التعامل مع المشاريع الضخمة والمعقدة التي تتطلب خبرات متقدمة وفريقًا محترفًا.
</p>
                </div>

              
            </li>

            <li>
                <div class="text">
                    <strong>ثانيًا: الأعمال الخرسانية والهيكل الإنشائي</strong>
                    <p>نوفر حلولًا هندسية متطورة في تنفيذ الهياكل الخرسانية بمختلف أنواعها، مع دقة في الصب وجودة في التنفيذ تضمن متانة البناء لعقود طويلة.</p>
                </div>
                               

            </li>

            <li>
                
                <div class="text">
                    <strong>ثالثًا: التشطيبات الفاخرة والمتميزة</strong>
                    <p>نقدم تشطيبات راقية تجمع بين جمال التصميم وجودة التنفيذ، باستخدام مواد عالية الفخامة لضمان مستوى يعكس الهوية الراقية للعملاء والمشاريع.</p>
                </div>
               
            </li>

            <li>
               
                <div class="text">
                    <strong>رابعًا: ترميم المباني وإعادة التأهيل العمراني</strong>
                    <p>نعيد للمباني الحيوية جمالها وقوتها عبر أنظمة حديثة للترميم، معالجة التشققات، تعزيز الهياكل، وتطوير الواجهات بما يتناسب مع الطراز الجديد.</p>
                </div>
                
            </li>

            <li>
               
                <div class="text">
                    <strong>خامسًا: خدمات التصميم والديكور الداخلي</strong>
                    <p>نبتكر تصاميم تنسجم مع شخصية المكان ورؤية العميل، وننفذها بأعلى درجات الإتقان لتتحول المساحات إلى بيئات نابضة بالحياة والانسجام</p>
                </div>
                 
            </li>
        </ul>

    </div>

</section>




<style>



.title-box {
    display: inline-block;
    font-size: 30px;
    font-weight: 800;
    margin-bottom: 25px;
    color: #1e1e1e;
}

.title-box span {
    background: linear-gradient(to left, #2da6ff, #155f9b);
    color: #fff;
    padding: 6px 15px;
    border-radius: 8px;
    margin-right: 8px;
}

#services-section {
    display: flex;
    flex-direction: row-reverse;
    width: 100%;
    min-height: 650px;
    overflow: hidden;
    direction: rtl;
         scroll-margin-top: 90px;

}


#services-section .left-image {
    width: 50%;
    background-image: url('assets/img/construction.jpg');
    background-size: cover;
    background-position: bottom left;  
    background-repeat: no-repeat;
}


#services-section .right-content {
    width: 50%;
    padding: 60px 50px;
    background: #F7F7F7;
}

#services-section h2.title {
    font-size: 32px;
    font-weight: 800;
    color: #1e1e1e;
    margin-bottom: 20px;
}

#services-section p.desc {
    color: #555;
    font-size: 17px;
    margin-bottom: 35px;
    line-height: 1.8;
}

.services-list {
    padding: 0;
    margin: 0;
    align-items: flex-start; 
    margin-bottom: 40px;
    list-style: none;
}

.services-list li {
    opacity: 0;
    transform: translateY(20px);
    margin-bottom: 25px; 
    animation: fadeSlide 0.8s ease forwards;
}

.services-list li:nth-child(1) { animation-delay: 0.5s; }
.services-list li:nth-child(2) { animation-delay: 0.7s; }
.services-list li:nth-child(3) { animation-delay: 0.8s; }
.services-list li:nth-child(4) { animation-delay: 1s; }
.services-list li:nth-child(5) { animation-delay: 1.5s; }

@keyframes fadeSlide {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}


.services-list .percent {
    width: 120px;
    height: 35px;
    background: linear-gradient(to left, #2da6ff, #3b5998);
    color: #fff;
    border-radius: 25px;
    text-align: center;
    line-height: 35px;
    font-weight: bold;
    margin-left: 20px;
    
}

.services-list .text strong {
    display: block;
    font-size: 18px;
    color: #222;
    margin-bottom: 10px;
}

.services-list .text p {
    color: #666;
    margin: 0;
}



</style>
