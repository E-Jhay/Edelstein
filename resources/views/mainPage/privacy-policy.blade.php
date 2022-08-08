@extends('layouts.app')

@section('content')
<section class="privacy-policy" style="background-image: url('{{ asset('img/privacy-policy.png') }}');">
    <div class="container">
        <div class="text-center">
            <h1>Privacy Policy</h1>
        </div>
    </div>
</section>

<section class="contacts">
    <div class="container">
        <div class="policy">
            <p>We reserve the right to change this policy at any given time, of which you will be promptly updated. If you want to make sure that you are up to date with the latest changes, we advise you to frequently visit this page.</p>
            <p>Edelstein respects your concerns about privacy. This Privacy Notice details and sets forth our protocol for collecting personal information, how that information is used, and with whom we share it. We also describe the methods and options that you, as the user of our Site, have with regard to our use of the information.</p>
            <p>We will also describe the measures that we take to protect the security of the information, and the steps you may take to learn more about our privacy policy and procedures.</p>
            <h1>Information We Collect; Protocol for Collection</h1>    
            <p>We may collect personal information about you in various ways, such as when you provide it at our stores, at our retailers, on our website, through our apps and social media channels, at our events or trade shows, through surveys, via text messages, email, or on the telephone. The personal information we may collect includes:</p>
            <ul>
                <li>Contact information (such as name, postal address, email address, and mobile or other telephone number);</li>
                <li>Username and password;</li>
                <li>Payment information (such as your payment card number, expiration date, authorization number or security code, delivery address, and billing address);
                    Purchase and transaction information;</li>
                <li>Customer service information (such as customer service inquiries, comments, and repair history);</li>
                <li>Photographs, comments and other content you provide;</li>
                <li>Information regarding your personal or professional interests, date of birth, marital status, demographics, and experiences with our products and contact preferences;</li>
                <li>Contact information you provide about friends or other people you would like us to contact; and</li>
                <li>Information we may obtain from our third-party services providers.</li>
            </ul>
            <p>In addition, when you visit our website, open our emails, use our apps, interact with Edelstein on social media, or interact with Edelstein-related tools, widgets or plug-ins, we may collect certain information by automated means, such as cookies, web beacons and web server logs. The information we collect in this manner includes IP address, unique device identifier, browser characteristics, device characteristics, operating system, language preferences, referring URLs, information on actions taken on our Site, and the dates and times of website visits.</p>
            <h1>Definitions</h1>
            <p>A “cookie” is a file that websites send to a visitor’s computer or other Internet-connected device to uniquely identify the visitor’s browser or to store information or settings in the browser.</p>
            <p>A “web beacon” also known as an Internet tag, pixel tag or clear GIF, links web pages to web servers and their cookies and may be used to transmit information collected through cookies back to a web server. Through these automated collection methods, we obtain “clickstream data”.</p> 
            <p>“Clickstream data” is a log of the links and other content on which a visitor clicks while browsing a website.</p>
            <h1>Process</h1>
            <p>As a visitor clicks through the website, a record of the action may be collected and stored. We may link certain data elements we have collected through automated means, such as your browser information, with other information we have obtained about you to let us know, for example, whether you have opened an email we sent you. Your browser may tell you how to be notified when you receive certain types of cookies or how to restrict or disable certain types of cookies. Please note, however, that without cookies you may not be able to use all of the features of our websites or apps.</p>
            <p>The providers of third-party apps, tools, widgets, and plug-ins on our websites and apps, such as Facebook or Instagram “Like” buttons, also may use automated means to collect information regarding your interactions with these features. This information is collected directly by the providers of the features and is subject to the privacy policies or notices of these providers. To the extent permitted by applicable law, Edelstein is not responsible for the information practices of these providers.</p>  
            <h1>How we Use Information We Collect</h1>
            <p>We may process and use the information described above to:</p>
            <ul>
                <li>Provide products and services to you;</li>
                <li>Process your payments;</li>
                <li>Create and manage your account;</li>
                <li>Send you promotional materials and other communications;
                    <ul>
                        <li>Communicate with you about, and administer your participation in –
                            Special events,</li>
                        <li>Programs,</li>
                        <li>Offers,</li>
                        <li>Surveys, and</li>
                        <li>Market research</li>
                    </ul>
                </li>
                <li>Respond to your inquiries;</li>
                <li>Operate, evaluate, and improve our business – by
                    <ul>
                        <li>Developing new products and services;</li>
                        <li>Enhancing and improving our services;</li>
                        <li>Managing our communications;</li>
                        <li>Analyzing our products, service, and customer base;</li>
                        <li>Performing data analytics (including web analytics); and</li>
                        <li>Performing accounting, auditing, and other internal functi</li>
                    </ul>
                </li>
                <li>Reduce credit risk and manage collections;</li>
                <li>Verify your identity;</li>
                <li>Protect against, identify, and prevent fraud and other unlawful activity, claims and other liabilities; and</li>
                <li>Comply with and enforce applicable legal requirements, relevant industry standards, contractual obligations and our policies.</li>
            </ul> 
            
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