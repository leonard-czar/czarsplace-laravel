<footer class="czp-footer">
    <div class="container-fluid px-3 px-lg-4">
        <div class="row g-4 py-4 py-lg-5 czp-footer__grid">
            <div class="col-12 col-md-6 col-lg-4">
                <h4 class="czp-footer__heading">About us</h4>
                <p class="czp-footer__text">
                    <strong>Luxury</strong> is what sets apart ambitious people from others.
                    <strong>Style</strong> is what sets apart sophisticated people from others.
                    <strong>Quality</strong> is what sets wise people apart from others.
                    At <strong>Czar's Place</strong>, our vision is to provide our clients with premium watches that have luxury, style, and quality.
                </p>
                <p class="czp-footer__text mb-0">
                    <em>Why choose us?</em> One word: <strong>honesty</strong>. Our recommendations are tailored to your needs so you can wear your own style with confidence.
                </p>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <h4 class="czp-footer__heading">Disclaimer</h4>
                <p class="czp-footer__text mb-0">
                    We are not an official dealer for the products we sell and have no affiliation with the manufacturer.
                    All brand names and trademarks are the property of their respective owners and are used for identification purposes only.
                </p>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <h4 class="czp-footer__heading">Follow us</h4>
                <div class="czp-footer__socials">
                    <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" class="czp-footer__social" aria-label="Facebook">
                        <img src="{{ asset('images/fb1.png') }}" alt="" width="36" height="36" class="socials" role="presentation">
                    </a>
                    <a href="https://twitter.com/leonard_czar" target="_blank" rel="noopener noreferrer" class="czp-footer__social" aria-label="Twitter">
                        <img src="{{ asset('images/twitter2.png') }}" alt="" width="36" height="36" class="socials" role="presentation">
                    </a>
                    <a href="https://instagram.com/leonard_czar" target="_blank" rel="noopener noreferrer" class="czp-footer__social" aria-label="Instagram">
                        <img src="{{ asset('images/ig1.png') }}" alt="" width="36" height="36" class="socials" role="presentation">
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-2 text-md-start text-center text-lg-start">
                <h4 class="czp-footer__heading">Contact</h4>
                <p class="czp-footer__contact mb-2">
                    <i class="fa-solid fa-phone me-2 text-warning" aria-hidden="true"></i>
                    <a href="tel:+2348182281634">08182281634</a>
                </p>
                <p class="czp-footer__contact mb-0">
                    <i class="fa-solid fa-message me-2 text-warning" aria-hidden="true"></i>
                    <a href="#">Message</a>
                </p>
            </div>
        </div>
    </div>
    <div class="czp-footer__bar">
        <div class="container-fluid px-3 px-lg-4 py-3 text-center">
            <span class="czp-footer__copy">&copy; {{ date('Y') }} {{ config('app.name', "Czar's Place") }}. All rights reserved.</span>
        </div>
    </div>
</footer>

<a href="https://wa.me/2348182281634" target="_blank" rel="noopener noreferrer" class="czp-float-wa" aria-label="Chat on WhatsApp">
    <img src="{{ asset('images/wats2.png') }}" alt="" width="28" height="28" role="presentation">
    <span class="czp-float-wa__label">Chat</span>
</a>
