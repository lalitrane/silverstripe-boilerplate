<section class="">
    <div id="homeslider" class="carousel slide d-none d-md-block" data-bs-ride="carousel">
        <div class="carousel-inner">
            <% loop $FeaturedBanners %>
            <!-- start carousel-item -->
            <div class="carousel-item <% if $Pos == 1 %> active  <% end_if %>  <% if $TextVariation == 'dark' %> text-dark <% else %> text-white<% end_if %>"
                style="background:url($PrimaryPhoto.Link)" data-bs-interval="4000">
                <!-- start container -->
                <% if not $HideText %>
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-lg-5 col-sm-12 banneralign" style="">
                            <h1>$Title</h1>
                            <p>$Description.RAW</p>


                        </div>
                    </div>
                </div>
                <% end_if %>
                <!-- End container -->

         


                <% if $TopLayeredPhoto %>
    <div class="layerbanner">
        <img src="$TopLayeredPhoto.URL" alt="$Title" class="">
    </div>
<% end_if %>

            </div>
            <!-- End carousel-item -->
            <% end_loop %>
            <% if $FeaturedBanners.Count > 1 %>
            <!-- <button class="carousel-control-prev" type="button" data-bs-target="#homeslider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#homeslider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button> -->
            <% end_if %>


        </div>
        <% if $FeaturedBanners.Count > 1 %>
        <ol class="carousel-indicators">
            <% loop $FeaturedBanners %>
            <button type="button" data-bs-target="#homeslider" data-bs-slide-to="$SlideIndex"
                class="<% if $SlideIndex == 0 %>active<% end_if %>">
            </button>
            <% end_loop %>
        </ol>
        <% end_if %>



    </div>
</section>




<div id="homeslider1" class="carousel  d-block d-md-none" data-bs-ride="carousel">
    <% loop $FeaturedBanners %>
    <!-- start Mobile carousel-item -->
    <div class="carousel-item <% if $Pos == 1 %> active  <% end_if %>  <% if $TextVariation == 'dark' %> text-white <% else %> text-dark<% end_if %>"
        data-bs-interval="500000">

        <!-- start Mobile container -->
        <% if not $HideText %>
        <div class="container ">


            <img src="$MobilePhoto.Link" class="img-fluid" />
            <h1>$Title</h1>
            <p>$Description</p>

        </div>

        <% else %>
                    <img src="$MobilePhoto.Link" class="img-fluid" />
        <% end_if %>
        <!-- End Mobile container -->
    </div>
    <!-- End Mobile carousel-item -->
    <% end_loop %>

   
</div>
<div class="clearfix">
</div>
