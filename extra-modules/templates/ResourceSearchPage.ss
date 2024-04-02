
<% include Hero %>
<a name="id1"></a>
<!-- BEGIN CONTENT WRAPPER -->
<div class="container" id="introcontent">

        <div class="search py-5">


$ResourceSearchForm

            </div>
        </div>
            <!-- END MAIN CONTENT -->
<section>
<div class="graddivider   <% include Gradient %> position-relative w-25"></div>
    <div class="container py-5">
<% if $Results %>
    <div class="row">
<% if $SQustring %>
    <h3 class="fw-bold"> Results</h3>
<% end_if %>
<% loop $Results %>


    <div class="col-lg-3 mb-4" data-aos="fade-up">
<div class="
        grad4 position-relative w-100 resourcethumb  top-rounded text-center">
            <img src="$PrimaryPhoto.Link" class="img-fluid  " />
        </div>
        <div class="greybg p-4">
            <% loop ResourceType %>
            <span class="minheight">$Title</span>

            <% end_loop %>

            <h4 class="fw-bold">$Title</h4>
            <div class="resintro mb-2">
            <% if $Blurb %>
            $Blurb

            <% else %>
                $Description.FirstSentence
            <% end_if %>
            </div>

<% if $pdfupload %>
            <% if $Gated %>  
<a href="" class="btn btn-outline  requestbtn d-none" data-bs-toggle="modal" data-bs-target="#resoucemodal" data-id="$pdfupload.AbsoluteLink" data-resourcetitle="$Title">Download</a>
<a href="$pdfupload.Link" class="btn btn-outline downloadbtn  d-none" target="_blank">Download</a>

        <% else %>
            <a href="$pdfupload.Link" class="btn btn-outline" target="_blank">Download</a>
        <% end_if %>
<% else_if $vimeoID %>

<%-- <a href="" class="btn btn-outline  requestbtn d-none" data-bs-toggle="modal" data-bs-target="#resoucemodal" data-id="$Link" data-resourcetitle="$Title">Watch</a> --%>
<a href="$Link" class="btn btn-outline   ">Watch</a>

<%-- <a href="$Link" class="btn btn-outline d-none">Watch</a> --%>
    <% end_if %>
        </div>
    </div>

<% end_loop %>


</div>

<div class="hidden-xs text-end pagination">
    <% loop $Results.PaginationSummary %>
        <% if $Link %>
            <span <% if $CurrentBool %>class="active"<% end_if %>><a href="$Link">$PageNum</a></span>
        <% else %>
        <span>...</span>
        <% end_if %>
    <% end_loop %>
</div>
<div class="clear mb-5"></div>
<% else  %>

<p>No resources found</p>

<% end_if %>
</div>
</section>
  

<% include SFgating %>


 


<!-- END CONTENT WRAPPER -->