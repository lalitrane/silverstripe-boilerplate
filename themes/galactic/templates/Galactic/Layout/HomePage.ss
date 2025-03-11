<% include HomeSlider %>
<Section class="my-5">
    <section class=" position-relative">
        <div class="container pb-5" data-aos="fade-up">

            <div class="row">
<% if $ElementalArea %>
    $ElementalArea
<% end_if %>
                <%-- <% if $Content %>
                <div class="col-lg-12">
                    $Content
                </div>
                <% end_if %> --%>
            </div>
        </div>
    </section>
    <% if getVendors %>
    <section>
        <div class="container">
            <div class="row vendors">

                <% loop getVendors %>
                <div class="col-lg-4">
                <img src="$VendorLogo.Link" class="img-fluid" <% if $VendorLogo.Description %>alt="$VendorLogo.Description" <% else %> alt="$VendorLogo.Title" <% end_if %> />
                    
                </div>
                <% end_loop %>
            </div>
        </div>

    </section>

<% end_if %>
</section>
<% if getVendors %>
<script>

// https://github.com/ganlanyuan/tiny-slider


    var slider = tns({
        container: '.vendors',
        items: 12,
        nav: true,
        autoHeight: true,
        //slideBy: "page",
        controls: false,
        loop: true,
        slideBy: 1,
        responsive: {
            300: {
                edgePadding: 20,
                gutter: 30,
                items: 1,

            },
            414: {
                edgePadding: 20,
                gutter: 30,
                items: 1,

            },
            640: {
                edgePadding: 20,
                gutter: 30,
                items: 1,

            },
            700: {
                gutter: 30,
                items: 1,

            },
            900: {
                items: 3,

            },
            1000: {
                items: 3,

            }
        }
    });
</script>

<% end_if %>
