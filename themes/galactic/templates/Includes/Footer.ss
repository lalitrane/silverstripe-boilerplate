<footer class="footerpy-3" role="contentinfo">




    <section class="position-relative footersection py-3">

        <div class="container">
            <div class="row">

                <div class="col-lg-3">
                    <a href="$BaseHref" class="brand">
                        <% if $SiteConfig.Logo_Dark %>
                            <img src="$SiteConfig.Logo_Dark.URL" title="$SiteConfig.Logo_Dark.Title" alt="$SiteConfig.Logo_Dark.Title" />
                
                            <% end_if %>
                    </a>
                </div>
           <div class="col-lg-4">
            <div class="row">
          

          <div class="col-lg-6">
            <ul class="footernav">
            <% loop footermenu_first %>
            <li class="$FirstLast $LinkingMode"><a href="$Link" title="Go to the $Title.XML page"><span>$MenuTitle.XML</span></a></li>
        <% end_loop %>    
    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="footernav">

                        <% loop footermenu_second %>
                        <li class="$FirstLast $LinkingMode"><a href="$Link" title="Go to the $Title.XML page"><span>$MenuTitle.XML</span></a></li>
                    <% end_loop %>  
          
                </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-5">

            <div class="row">
                <div class="col-lg-6">
                    <% with $SiteConfig %>
$Address
                    <% end_with %>
                </div>
                <div class="col-lg-6">
        <% with $SiteConfig %>

            <div class="ctaemails">
            <% if $PhoneNumber %><a href="tel:$PhoneNumber" >$PhoneNumber</a><% end_if %>
                <% if $Email %><a href="mailto:$Email" >$Email</a><% end_if %>
                <% if $Email1 %><a href="mailto:$Email1" >$Email1</a><% end_if %>
            </div>
            <ul class="socialprofiles mt-3">

            <% if $LinkedIn  %>
                <li>
    <a href="$LinkedIn"><i class="bi bi-linkedin"></i></a>
</li>
<% end_if %>

<% if $Twitter  %>
    <li>
    <a href="$Twitter"><i class="bi bi-twitter"></i></a>
</li>
<% end_if %>
<% if $Facebook  %>
    <li>
    <a href="$Facebook"><i class="bi bi-facebook"></i></a>
</li>
<% end_if %>
<% if $Youtube  %>
    <li>
    <a href="$Youtube"><i class="bi bi-youtube"></i></a>
</li>
<% end_if %>
<% if $Instagram  %>
    <li>
    <a href="$Instagram"><i class="bi bi-instagram"></i></a>
</li>
<% end_if %>
            <% end_with %>
        </ul>
        </div>

        </div>
        </div>
        </div>
        </div>


    

        </div>
    </section>





        <div class="container text-white">

<hr/>
            <div class="row">
                <div class="col-lg-12">
                    <% with $SiteConfig %>
                    <div class="copyright pt-3">
                        <div class="d-inline-block">
                            <% if $Copyright %>
                        &#169;    $Now.Year  $Copyright 
                    <% end_if %>
                    </div>
                        <% end_with %>
                        <ul class="d-inline-block copyrightnav">
<% loop $CopyrightCTA %>
<li class="$FirstLast $LinkingMode"><a href="$Link" title="Go to the $Title.XML page"><span>$MenuTitle.XML</span></a></li>

<% end_loop %>
</ul>
                    </div>
                </div>

       
            
            </div>
  
    </div>





</footer>