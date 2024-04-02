<% include Hero %>

<section class="pt-5  mt-5 position-relative bg-lightgrey">

    <div class="container pb-5  aos-init aos-animate" data-aos="fade-up">

        <h2 class="pt-3 pb-5 text-center">$Title</h2>
        <div class="row">
            <% loop $children %>


            <div class="col-xl-3 col-lg-4 col-md-6 py-3 mb-4 bg-white">
                <div class="p-2">
                <img src="$HeroImage.URL" class="img-fluid" />
                </div>
                <hr/>
                <% if $VendorLogo %>
                <img src="$VendorLogo.URL" class="img-fluid" />
                <% end_if %>
                <h3> $Title</h3>


                <p>$Subtitle.FirstSentence</p>


                <a href="$Link" class="btn d-inline-block smallbtn">more</a>

            </div>
            <% end_loop %>

        </div>
    </div>
</section>
