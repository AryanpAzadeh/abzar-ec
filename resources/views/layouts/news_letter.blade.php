<div class="axil-newsletter-area axil-section-gap pt--0">
    <div class="container">
        <div class="etrade-newsletter-wrapper bg_image bg_image--12">
            <div class="newsletter-content">
                        <span class="title-highlighter highlighter-primary2"><i
                                class="fas fa-envelope-open"></i>خبرنامه</span>
                <h2 class="title mb--40 mb_sm--30">دریافت آپدیت هفتگی</h2>
                <form action="{{route('store.email.newsletter')}}" method="post">
                    @csrf
                <div class="input-group newsletter-form">

                        <div class="position-relative newsletter-inner mb--15">
                            <input placeholder="example@gmail.com" type="email" name="email">
                        </div>
                        <button type="submit" class="axil-btn mb--15">اشتراک</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    <!-- End .container -->
</div>
