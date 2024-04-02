<% include Hero %>

<section class="container mb-3 mt-4 pt-5">
    <div class="row">




        <% if $ImageCard1Copy %>
        <div class="col-lg-4">
            <div class="text-center mp-benefit">
                <img src="$ImageCard1.Link" class="img-fluid" />
                <div class="cardcopy text-center p-3">
                    <p> $ImageCard1Copy</p>
                </div>
            </div>
        </div>
    <% end_if  %>
    <% if $ImageCard2Copy %>
        <div class="col-lg-4">
            <div class="text-center mp-benefit">
                <img src="$ImageCard2.Link" class="img-fluid" />
                <div class="cardcopy text-center p-3">
                    <p> $ImageCard2Copy</p>
                </div>
            </div>
        </div>
    <% end_if  %>

    <% if $ImageCard3Copy %>
        <div class="col-lg-4">
            <div class="text-center mp-benefit">
                <img src="$ImageCard3.Link" class="img-fluid" />
                <div class="cardcopy text-center p-3">
                    <p> $ImageCard3Copy</p>
                </div>
            </div>
        </div>
    <% end_if  %>
    </div>

</section>
<section class="pt-5  position-relative bg-lightgrey">



    <div class="container pb-5 mt-2 text-center" data-aos="fade-up">
        <div class="row">



        <% loop $machinerypages %>
            <div class="col-lg-6 mb-4">
            <h2 class="pb-3"> $Title</h2>
 
            <div class="card">
                <a href="$Link" >
                <img src="$HeroImage.Link" class="img-fluid" />
            </a>
            </div>

            <div class="px-5 pt-4">$Subtitle</div>
            <div class="text-center d-inline-block pt-4">
                <a href="$Link" class="btn d-inline-block">Find out more</a>
            </div>
        </div>
        <% end_loop %>
     
        </div>

    </div>



</section>




<% include Testimonial %>


</div>
