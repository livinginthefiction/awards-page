<!-- english footer -->
<footer class="footer p-0 <?= ($_SESSION['language']=='en') ? "":"d-none" ?>">
  <div class="row w-100 bg-light">
  </div>
  <section class="w-100 bg-light ">
        <div class="">
          <div class="row  "></div>
          <div class="row ">
          <div class="col-md-6 p-5 section1">
              <div class="elementor-widget-container">
              <h4 style="margin-top: 0rem; margin-bottom: 0.5rem;">Al Yousuf Head Office 1<sup>st</sup> floor,</h4><h4 style="margin-top: 0rem; margin-bottom: 0.5rem;">Near Al Safa Metro Station,</h4><h4 style="margin-top: 0rem; margin-bottom: 0.5rem;">Sheikh Zayed Road,</h4><h4 style="margin-top: 0rem; margin-bottom: 0.5rem;">Dubai U.A.E</h4><h5>Tel: <a style="color: #0e2292;" href="tel:+97143390000">+971 4 339 0000</a></h5><h5>Email: <a style="color: #0e2292;" href="mailto:info@alyousuf.com">info@alyousuf.com</a></h5>           </div>
              <br>
              <div class=""><p style="font-size: 0.9rem; color: black;">@2022 – AL YOUSUF&nbsp;<a style="color: #0e2292;" href="https://www.konemamwenenge.com/alyousuf-website/terms-and-conditions/"> Terms &amp; Conditions</a></p></div>        
          </div>
          <div class="col-md-6 p-5 section2">
              <!-- <h5 class="text-uppercase title"><?= $lang['recentnews'] ?></h5> 
              <ul class="news-item">
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </br> Ut elit tellus <a style="color: #0e2292; text-decoration: underline;" href="#">Read More</a></li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </br> Ut elit tellus <a style="color: #0e2292; text-decoration: underline;" href="#">Read More</a></li>
              </ul>  -->        
          </div>
          </div>
        </div>
    </section> 
<!--   <section class="w-100 bg-dark py-1">
        <div class="pl-4">
              <h5><a style="color: white;font-weight: 400;font-size: 1rem;" href="https://www.konemamwenenge.com/alyousuf-website/"><?= $lang['tcpp'] ?></a></h5>           </div>
    </section>  -->       
</footer>

<!-- arabic footer -->
<style type="text/css">
  <?php
    if ($_SESSION['language']!='en') {echo '.elementor-widget-container{border-left: 3px solid #0E2292;border-right:none;}';}
  ?>
</style>
<footer class="footer p-0 <?= ($_SESSION['language']=='en') ? "d-none": "" ?>">
  <div class="row w-100 bg-light">
  </div>
  <section class="w-100 bg-light ">
        <div class="">
          <div class="row  "></div>
          <div class="row ">
          <div class="col-md-6 p-5 section1">
            <!-- <h5 class="text-uppercase title"><?= $lang['recentnews'] ?></h5> 
              <ul class="news-item">
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </br> Ut elit tellus <a style="color: #0e2292; text-decoration: underline;" href="#">Read More</a></li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </br> Ut elit tellus <a style="color: #0e2292; text-decoration: underline;" href="#">Read More</a></li>
              </ul>  --> 
                   
          </div>
          <div class="col-md-6 p-5 section2">
            <div class="elementor-widget-container text-right">
              <h4 style="margin-top: 0rem; margin-bottom: 0.5rem;" dir="rtl">دبي – الإمارات العربية المتحدة</h4>
              <h4 dir="rtl" style="margin-top: 0rem; margin-bottom: 0.5rem;">شارع الشيخ زايد</h4>
              <h4 dir="rtl" style="margin-top: 0rem; margin-bottom: 0.5rem;">بالقرب من محطة مترو الصفا</h4>
              <h4 dir="rtl" style="margin-top: 0rem; margin-bottom: 0.5rem;">مكتب اليوسف الرئيسي ، الطابق الأول</h4>
              <h5 dir="rtl">Tel: <a style="color: #0e2292;" href="tel:+97143390000">+971 4 339 0000</a></h5>
              <h5 dir="rtl">Email: <a style="color: #0e2292;" href="mailto:info@alyousuf.com">info@alyousuf.com</a></h5>           </div>  
              <br>
              <div class="text-right"><p dir="rtl" style="font-size: 0.9rem; color: black;"><a style="color: #0e2292;" href="https://www.konemamwenenge.com/alyousuf-website/terms-and-conditions/"> الشروط والأحكام</a> AL YOUSUF – @2022</p></div>            
          </div>
          </div>
        </div>
    </section> 
<!--   <section class="w-100 bg-dark py-1">
        <div class="pl-4">
              <h5><a style="color: white;font-weight: 400;font-size: 1rem;" href="https://www.konemamwenenge.com/alyousuf-website/"><?= $lang['tcpp'] ?></a></h5>           </div>
    </section>   -->      
</footer>