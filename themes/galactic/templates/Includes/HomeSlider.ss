<div id="homeslider" class="carousel slide d-none d-md-block" data-bs-ride="carousel">

    <div class="carousel-inner">

            <% loop $FeaturedBanners %>
            <!-- start carousel-item -->
            <div class="carousel-item <% if $Pos == 1 %> active  <% end_if %>  <% if $TextVariation == 'dark' %> text-dark <% else %> text-white<% end_if %>"
                style="background:url($PrimaryPhoto.Link)" data-bs-interval="50000">

                <!-- start container -->
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-lg-4 col-sm-12 banneralign" style="">
                            <h1>$Title</h1>
                            <p>$Description</p>
                        </div>
                    </div>
                </div>
                <!-- End container -->
            </div>
            <!-- End carousel-item -->
            <% end_loop %>
            <% if $FeaturedBanners.Count > 1 %>
                <button class="carousel-control-prev" type="button" data-bs-target="#homeslider" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#homeslider" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                <% end_if %>


    </div>
</div>




<div id="homeslider1" class="carousel slide d-block d-md-none" data-bs-ride="carousel">

    <% loop $FeaturedBanners %>
    <!-- start carousel-item -->
    <div class="carousel-item <% if $Pos == 1 %> active  <% end_if %>  <% if $TextVariation == 'dark' %> text-white <% else %> text-dark<% end_if %>"
        data-bs-interval="5000">

        <!-- start container -->
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-4 col-sm-12 banneralign" style="">
                    <img src="$PrimaryPhoto.Link" class="img-fluid"/>
                    <h1>$Title</h1>
                    <p>$Description</p>
                </div>
            </div>
        </div>
        <!-- End container -->
    </div>
    <!-- End carousel-item -->
    <% end_loop %>

    <% if $FeaturedBanners.Count > 1 %>
        <button class="carousel-control-prev" type="button" data-bs-target="#homeslider1" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#homeslider1" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <% end_if %>

</div>
<div class="clearfix">
</div>
