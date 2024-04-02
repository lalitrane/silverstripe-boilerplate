<% include Hero %>

<section class="py-5 position-relative">



    <div class="container py-5" data-aos="fade-up">

        <div class="row product-feature-holder">

            <div class="col-lg-3 d-flex flex-column justify-content-center leftcol">

        
                <% loop ProductFeature %>
                  <div class="product-feature d-flex mb-3">
                  <% if $EvenOdd == odd %>
                    <div>
                    <p class="featuretitle"> $Title</p>
                <p>
                    $Description</p>
                  </div>

                <img src="$FeatureImage.Link" />

                  <% end_if %>
                </div>
                <% end_loop %>
   
          </div>

            <div class="col-lg-6 text-center midcol">
                <img src="$ProductImage.Link" class="img-fluid mainproductimage" />
            </div>

            <div class="col-lg-3 d-flex flex-column justify-content-center rightcol">
       
                <% loop ProductFeature %>
                  <div class="product-feature d-flex mb-3">
                  <% if $EvenOdd == even %>
                    <img src="$FeatureImage.Link" />
                    <div>
                    <p class="featuretitle"> $Title</p>
                <p>
                    $Description</p>
                  </div>
       

                  <% end_if %>
                </div>
                <% end_loop %>

            </div>

        </div>
        <div class="d-flex mb-4">
      <a  class="btn text-uppercase text-center m-auto" data-bs-toggle="modal" data-bs-target="#gic">Request a Quote</a>
    </div>
    </div>



</section>
<% loop CaseStudies.Filter('Product', $Title) %>
<Section style="background-image:url($ThemeDir/images/green-bg.jpg)" class="background-cover pb-4 productcasestudy" id="casestudy">
<div class="container text-white">
<div class="row">

<div class="col-lg-6 ">
  <img src="$CaseStudyLogo.Link" class="img-fluid casetudy-logo" />
<h6 class="case-title pt-5 text-uppercase text-white">
$Title</h6>
<% if $Description %>
<div class="text-white">$Description</div>
<% end_if %>
<div class="d-flex mb-2 switchdir">
<% if $Stats1Image %>
<div class="d-flex align-items-center statblock">
 
<img src="$Stats1Image.Link" class="statimage"/>
  <% end_if %>
  <% if $Stats1 %>
  <div class="ms-2 text-white">$Stats1</div>

</div>
<% end_if %>
<% if $Stats2Image %>
<div class="d-flex align-items-center statblock">

<img src="$Stats2Image.Link" class="statimage"/>
  <% end_if %>
  <% if $Stats2 %>
  <div class="ms-2 text-white">$Stats2</div>

</div>
<% end_if %>
</div>
<% if $Result %>
<div class="text-white">$Result</div>
<% end_if %>
</div>

  <div class="col-lg-6 rightimagecolumn">

    <img src="$RightImage.Link" class="img-fluid " />

  </div>
</div>
</div>
</section>
<% end_loop %>
<Section>
    <div class="container">
<% if ProductSpec %>
    <h2 class="text-center mt-5 pb-2">Product specs</h2>
      <table class="table table-bordered table-striped specstable text-center">
        <tr>
        <th>Code</th>
      <th>Application</th>
    <th>Grade</th>
  <th>Colour</th>
<th>Width <span>mm</span></th>
<th>Length <span>m</span></th>
<th>Thickness <span>um</span></th>
        </tr>
      <% end_if %>
<% loop ProductSpec %>
  <tr>
  <td> $Title</td>
<td> $Application</td>
<td> $Grade</td>
<td> $Colour</td>
<td> $Width</td>
<td> $Length</td>
<td> $Thickness</td>
  </tr>
<% end_loop %>
    </div>
  </table>
</section>


<%-- <% loop getTestimonials %>

<% if $Product == "futuretek" %>
<h1>$Title</h1>

<% end_if %>
<% end_loop %> --%>
</div>
