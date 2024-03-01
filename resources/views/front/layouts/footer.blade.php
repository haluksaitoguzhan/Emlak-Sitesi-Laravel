<!--/ footer Star /-->
<section class="section-footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-4">
        <div class="widget-a">
          <div class="w-header-a">
            <h3 class="w-title-a text-brand">EmlakAjansı</h3>
          </div>
          <div class="w-body-a">
            <p class="w-text-a color-text-a">
              En güzel yerler için bize ulaşın...
              Size hayalinizdeki evi bulalım ya da
              arsayı ya da bir başka mekanı :)
            </p>
          </div>
          <div class="w-footer-a">
            <ul class="list-unstyled">
              <li class="color-a">
                <span class="color-text-a">Tel:</span> 545 948 06 14
              </li>
              <li class="color-a">
                <span class="color-text-a">Email:</span> haluksaitoguzhan04@gmail.com
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-4 section-md-t3">
        <div class="widget-a">
          <div class="w-header-a">
            <h3 class="w-title-a text-brand">Şirketler</h3>
          </div>
          <div class="w-body-a">
            <div class="w-body-a">
              <ul class="list-unstyled">
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">Site Haritaları</a>
                </li>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">Yasal</a>
                </li>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">Emlak Yönetimi</a>
                </li>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">Kariyer</a>
                </li>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">Ortak</a>
                </li>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">Gizlilik Politikası</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-4 section-md-t3">
        <div class="widget-a">
          <div class="w-header-a">
            <h3 class="w-title-a text-brand">Uluslararası Sitelerimiz</h3>
          </div>
          <div class="w-body-a">
            <ul class="list-unstyled">
              <li class="item-list-a">
                <i class="fa fa-angle-right"></i> <a href="#">Venezuella</a>
              </li>
              <li class="item-list-a">
                <i class="fa fa-angle-right"></i> <a href="#">Katar</a>
              </li>
              <li class="item-list-a">
                <i class="fa fa-angle-right"></i> <a href="#">Dubai</a>
              </li>
              <li class="item-list-a">
                <i class="fa fa-angle-right"></i> <a href="#">Arjantin</a>
              </li>
              <li class="item-list-a">
                <i class="fa fa-angle-right"></i> <a href="#">Singapur</a>
              </li>
              <li class="item-list-a">
                <i class="fa fa-angle-right"></i> <a href="#">Endonezya</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <nav class="nav-footer">
          <ul class="list-inline">
            <li class="list-inline-item">
              <a href="{{ route('homepage') }}">Anasayfa</a>
            </li>
            <li class="list-inline-item">
              <a href="{{ route('about') }}">Hakkımızda</a>
            </li>
            <li class="list-inline-item">
              <a href="{{ route('tumIlanlar') }}">İlanlar</a>
            </li>
            <li class="list-inline-item">
              <a href="{{ route('contact') }}">İletişim</a>
            </li>
          </ul>
        </nav>
        <div class="socials-a">
          <ul class="list-inline">
            <li class="list-inline-item">
              <a href="#">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fa fa-pinterest-p" aria-hidden="true"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fa fa-dribbble" aria-hidden="true"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="copyright-footer">
          <p class="copyright color-text-a">
            &copy; Copyright
            <span class="color-a">EmlakAjansı</span> Bu bir öğrenci ödev sitesidir!
          </p>
        </div>
        <div class="credits">
          <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
            -->
        </div>
      </div>
    </div>
  </div>
</footer>
<!--/ Footer End /-->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Çıkış Yap!</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Çıkış yapmak istiyor musunuz?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">İptal</button>
        <a class="btn btn-primary" href="{{ route('admin_cikis')}}">Çıkış Yap</a>
      </div>
    </div>
  </div>
</div>

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<div id="preloader"></div>
<script src="{{ asset('front')}}/lib/jquery/jquery.min.js"></script>
<script src="{{ asset('front')}}/lib/jquery/jquery-migrate.min.js"></script>
<script src="{{ asset('front')}}/lib/popper/popper.min.js"></script>
<script src="{{ asset('front')}}/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ asset('front')}}/lib/easing/easing.min.js"></script>
<script src="{{ asset('front')}}/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="{{ asset('front')}}/lib/scrollreveal/scrollreveal.min.js"></script>
<!-- Contact Form JavaScript File -->
<!-- <script src="{{ asset('front')}}/contactform/contactform.js"></script> -->

<!-- Template Main Javascript File -->
<script src="{{ asset('front')}}/js/main.js"></script>
<!-- JavaScript Libraries -->

@yield('js')
@toaster_js
@toaster_render

</body>

</html>