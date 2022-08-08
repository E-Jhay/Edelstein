@extends('layouts.app')

@section('content')
<section class="about-us" style="background-image: url('{{ asset('img/about-us.png') }}');">
    <div class="container">
        <div class="text-center">
            <h1>About Us</h1>
        </div>
    </div>
</section>
<section class="company">
    <div class="container">
        <div class="split">
            <div>
                <img src="{{ asset('img/jewelry1.png') }}">
            </div>
            <div>
                <h2>The Company</h2>
                <p>Edelstein is an affordable line of jewellery from the Alaminos Pangasinan, Philippines. With layers of traditional lore interwoven with modern ethos, ours is a story deeply rooted in the sea state of Alaminos.</p>
                <p>While our home brand Western Perl is inspired by the incredible art and stunning architecture of the state, Edelstein is born out of the raw charisma of the vast sand dunes and desert terrain of Alaminos. This is the rustic side of the desert state – unseen, unexplored and unique in its simple charm.</p>
                <p>Edelstein is all about versatility and affordability. It caters to the multifaceted existence of the modern woman.</p>
            </div>
        </div>
    </div>
</section>
<section class="about-us founder">
    <div class="container">
        <div class="split">
            <div>
                <h2>The Jewelry</h2>
                <p>Ours is a range of jewellery with an effortless style statement. Exquisitely handcrafted with utmost finesse out of plain and gold-plated sterling silver, this is contemporary jewelery with a youthful appeal. The designs are flowy, easygoing, evergreen, and have an exotic allure about them.</p>
                <p>The muted and earthy undertones on sterling silver in Edelstein jewellery stands apart from the quintessential luxurious Edelstein brand’s approach to colourful gemstones, gold and enamel work. What remains the same, however, is the celebration of laborious traditional skills with attention to detail and high quality craftsmanship. From everyday wear to office jewelery, we have you covered for parties, dinner dates, cocktails and more. We have jewelery for every mood and occasion, and you can wear Edelstein anytime anywhere!</p>
            </div>
            <div>
                <img src="{{ asset('img/jewelry.png') }}">
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    window.onscroll = function(){
        let nav = document.querySelector('nav');
        nav.classList.toggle("scrolled", window.scrollY > 200);
    };
    // $(window).on("load",function(){
    //     $(".loader-wrapper").fadeOut("slow");
    // });
</script>
@endsection