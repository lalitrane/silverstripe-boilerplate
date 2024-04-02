<% include Hero %>


<section class="pt-5  mt-5 position-relative bg-lightgrey">

    <div class="container pb-5  aos-init aos-animate" data-aos="fade-up">
        <div class="row">
        <div class="col-lg-6">
       
            <% if $FeaturesTitle %>
               <h2> $FeaturesTitle </h2>
        
                <%-- <% else %>
                    <h2>     Features</h2> --%>
            <% end_if %>
            <div class="row">

                <div class="col-lg-6">
                    $Features1
                </div>

                <div class="col-lg-6">
                    $Features2
                </div>
            </div>
        </div>
        <div class="offset-lg-1 col-lg-5">
            <% if $BenefitsTitle  %>
                <h2> $BenefitsTitle </h2>
                 <% else %>
                     <h2>     Benefits</h2>
             <% end_if %>
             <% if $Benefits %>
                $Benefits
             <% end_if %>
        </div>
    </div>
    <div class="text-center d-flex justify-content-center">
        <% with $SiteConfig %>
        <% if $ctabutton %>
        <a  class="btn" data-bs-toggle="modal" data-bs-target="#gic">$ctabutton</a>
    <% end_if %>
<% end_with %>
    </div>
    </div>

</section>


<Section class="my-5 pt-5">
    <div class="container">

        <div class="row">
            <div class="col-lg-6">

                <% if $OptionsVIVideoURL  %>
                <iframe
                    src="https://player.vimeo.com/video/$OptionsVIVideoURL?h=c56fd83cef&amp;title=0&amp;byline=0&amp;portrait=0&amp;speed=0&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                    width="100%" height="500" frameborder="0" allow="autoplay; fullscreen; picture-in-picture"
                    allowfullscreen></iframe>
                <% end_if %>
                <% if $OptionsYTVideoURL  %>
                <iframe src="https://www.youtube.com/embed/$OptionsYTVideoURL" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen width="100%" height="350"></iframe>
                <% end_if %>
                <% if $OptionsImg  %>

                    <img src="$OptionsImg.URL" class="img-fluid"/>
                <% end_if %>
            </div>
            <div class="offset-lg-1 col-lg-5">
                <% if $OptionsTitle %>
                    <h2> $OptionsTitle </h2>
                     <% else %>
                         <h2>     Options</h2>
                 <% end_if %>
                <% if $Options  %>
                    $Options
                <% end_if %>

            </div>
        </div>


    </div>
</section>



<Section class="my-5">
    <div class="container">

        <div class="row">
            <% if $SpecificationsTitle %>
                <h2 class="text-center mt-5 pb-4"> $SpecificationsTitle </h2>
                 <% else %>
                     <h2 class="text-center mt-5 pb-4">     Specifications</h2>
             <% end_if %>
            <% if $Specifications  %>
                $Specifications
            <% end_if %>


        </div>


    </div>