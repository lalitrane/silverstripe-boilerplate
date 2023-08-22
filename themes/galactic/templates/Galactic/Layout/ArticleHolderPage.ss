<% include Hero %>
<Section class="my-5">
    <section class="position-relative bg-lightgrey">

        <div class="container pb-5  aos-init aos-animate" data-aos="fade-up">


            <div class="row">
                <% loop $children %>
                <% if $Title %>
                <a href="$Link">
                    <div class="col-xl-3 col-lg-4 col-md-6 py-3 mb-4 bg-white">


                        <% if $HeroImage %>
                        <img src="$HeroImage.URL" class="img-fluid" alt="$HeroImage.Title" title="$VendorLogo.Title" />
                        <% end_if %>
                        <% if $Title %>
                        <h3> $Title</h3>
                        <% end_if %>
                        <% if $Subtitle %>
                        <p>$Subtitle.FirstSentence</p>
                        <% end_if %>
                        <% if $HeroImage %>
                        <a href="$Link" class="btn d-inline-block smallbtn">more</a>
                        <% end_if %>
                    </div>
                </a>
                <% end_if %>
                <% end_loop %>

            </div>
        </div>
    </section>
</section>
