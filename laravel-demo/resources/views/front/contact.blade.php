@extends('front.layout.master')

@section('title', 'Contact')

@section('body')
<!-- -->
<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb-text">
          <a href="#"><i class="fa fa-home">Home</i></a>
          <span>Contact</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb Section End -->


<!-- Map Section Begin -->
<div class="map spad">
  <div class="container">
    <div class="map-inner">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d34421.59456635196!2d105.81864366715152!3d21.026938482004088!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab9bd9861ca1%3A0xe7887f7b72ca17a9!2zSMOgIE7hu5lpLCBIb8OgbiBLaeG6v20sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1666175150507!5m2!1svi!2s"
        height="610 " style="border:0; " allowfullscreen=" " loading="lazy "
        referrerpolicy="no-referrer-when-downgrade ">
      </iframe>
      <div class="icon d-none">
        <i class="fa fa-map-marker"></i>
      </div>
    </div>
  </div>
</div>
<!-- Map Section End -->

<!-- Contact Section Begin -->
<section class="contact-section spad">
  <section class="container">
    <div class="row">
      <div class="col-lg-5">
        <div class="contact-title">
          <h4>Contacts Us</h4>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Voluptatum, enim excepturi! Libero perferendis eius nulla tempore
            dolore omnis veniam explicabo sit inventore consequuntur! Ea magni
            molestias natus soluta! Nisi, modi?</p>
        </div>
        <div class="contact-widget">
          <div class="cw-item">
            <div class="ci-icon">
              <i class="ti-location-pin"></i>
            </div>
            <div class="ci-text">
              <span>Address:</span>
              <p>Trau Quy Town, Gia Lam, Ha Noi</p>
            </div>
          </div>
          <div class="cw-item">
            <div class="ci-icon">
              <i class="ti-mobile"></i>
            </div>
            <div class="ci-text">
              <span>Phone:</span>
              <p>+84 86.58.92.696</p>
            </div>
          </div>
          <div class="cw-item">
            <div class="ci-icon">
              <i class="ti-email"></i>
            </div>
            <div class="ci-text">
              <span>Email:</span>
              <p>tiennguyenvan23@gmail.com</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 offset-lg-1">
        <div class="contact-form">
          <div class="leave-comment">
            <h4>Leave a Comment</h4>
            <p>Our staff will call back later and answer your questions</p>
            <form action="#" class="comment-form">
              <div class="row">
                <div class="col-lg-6">
                  <input type="text" placeholder="Your name">
                </div>
                <div class="col-lg-6">
                  <input type="text" placeholder="Your email">
                </div>
                <div class="col-lg-12">
                  <textarea placeholder="Your message"></textarea>
                  <button type="submit" class="site-btn">Send message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</section>
<!-- Contact Section End -->

<!-- Parter Logo Section Begin -->
<div class="partner-logo ">
  <div class="contain er ">
    <div class="logo-carousel owl-carousel ">
      <div class="logo-item ">
        <div class="tablecell-inner ">
          <img src="img/logo-carousel/logo-1.png " alt=" ">
        </div>
      </div>
      <div class="logo-item ">
        <div class="tablecell-inner ">
          <img src="img/logo-carousel/logo-2.png " alt=" ">
        </div>
      </div>
      <div class="logo-item ">
        <div class="tablecell-inner ">
          <img src="img/logo-carousel/logo-3.png " alt=" ">
        </div>
      </div>
      <div class="logo-item ">
        <div class="tablecell-inner ">
          <img src="img/logo-carousel/logo-4.png " alt=" ">
        </div>
      </div>
      <div class="logo-item ">
        <div class="tablecell-inner ">
          <img src="img/logo-carousel/logo-5.png " alt=" ">
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Parter Logo Section End -->

@endsection
