@extends('layouts.app')

@section('content')
<section class="contact-us" style="background-image: url('{{ asset('img/contact-us.png') }}');">
    <div class="container">
        <div class="text-center">
            <h1>Contact Us</h1>
        </div>
    </div>
</section>

<section class="contacts">
    <div class="container">
        <div class="text-center">
            <h1>Need Help? We're just a click away!</h1>
            <p>At Edelstein, we care for each and every customer. So rest assured your issue will be resolved to the best of our abilities. Reach us on our social media accounts. You can also get in touch with us through email at edelstein@gmail.com or Call us at +639122950911.</p>
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