<% include Hero %>
<a name="id1"></a>
 <main class="pt-3" id="introcontent">
<div class="container">



    <div class="row">

        <div class="col-lg-6">

           
   

            <% if $vimeoID %>
                <% if $Gated %>  
  
 
                <div class="position-relative overflow-auto resoucevideothumb requestbtn videothumbholder" data-bs-toggle="modal" data-bs-target="#resoucemodal" data-id="$pdfupload.AbsoluteLink" data-resourcetitle="$Title" >

                    <% if $Videothumb %>
                    <div style="pointer-events: visible; background-image:url($Videothumb.Link)"
                        class="videothumb"  id="play-button" >
                    <i class="bi bi-play-circle" disabled style="pointer-events:none;"></i>
                </div>
                        <% else %>
                        <div style="pointer-events: visible; background-image:url( $ThemeDir/images/syft-webinars.jpg)"
                            class="videothumb"  id="play-button" >
                        <i class="bi bi-play-circle" disabled style="pointer-events:none;"></i>
                    </div>
                        <% end_if %>
                        

                    </div>
    
                           <iframe src="https://player.vimeo.com/video/$vimeoID" width="100%" height="360" frameborder="0"
                        allowfullscreen allow="autoplay; encrypted-media" class=" downloadbtn  d-none"> </iframe>   
                        <% else %>
                            <iframe src="https://player.vimeo.com/video/$vimeoID" width="100%" height="360" frameborder="0"
                        allowfullscreen allow="autoplay; encrypted-media" id="vimeovid1"> </iframe>                       
                    
                    <% end_if %>

           


                <% end_if %>

           

            
        </div>

        <div class="col-lg-6">
            <% if $Description %>
                $Description
            <% end_if %>

        </div>
   
    </div>

</div>



<% include SFgatingResourcepage %>
</main>