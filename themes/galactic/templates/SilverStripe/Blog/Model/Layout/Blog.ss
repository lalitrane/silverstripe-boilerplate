<%-- <% require css('silverstripe/blog: client/dist/styles/main.css') %> --%>
<% if $HeroImage %>

    <div style="background-image:url($HeroImage.Link)" class="offset-nav herobanner">

        <Div class="container banneralign">
            <div class="row">
    <div class="col-lg-4 col-sm-12">



            <h1 class="text-white pagetitle">

                <% if $Alttitle %>
                $Alttitle
                <% else %>
                $Title
                <% end_if %>
                <% if $Subtitle %>
                <br><span>$Subtitle</span>
                $Title
            <% end_if %>
            </h1>
        </div>
        </div>
        </div>

    </div>

    <% else %>



<% end_if %>
<Section class="my-5">
<div class="container">
$Content
</div>

<section class="pb-5 position-relative greybg" id="introcontent">
    <div class="graddivider  grad2 position-relative w-25"></div>
    <div class="container  mt-5 <% if $SideBarView %>unit<% end_if %>">
        <div class="row">
            <div class="col-lg-12">

                <div class="selectedholder my-4 text-center">
                    <select
                        onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
						<%-- <select id="post_topics"> --%>
                        <Option >Topic</option>
                            <% loop $Categories %>
                              
                            <option value="$Link?topic=$Title"> $Title</option>
             
                            <% end_loop %>
                    </select>
                           <% if $CurrentTag %>
            <%t SilverStripe\\Blog\\Model\\Blog.Tag 'Tag' %>: $CurrentTag.Title
        <% else_if $CurrentCategory %>
      <%t SilverStripe\\Blog\\Model\\Blog.Topic 'Topics' %>:
      $CurrentCategory.Title 

                
            <a href="/blog" class="d-block text-decoration-none mt-2"> Clear filter<i class="bi bi-x-lg"></i></a>

         
        <% end_if %>
                </div>
                <div class="row filteredblogs">

                    <% if $PaginatedList.Exists %>
                    <% loop $PaginatedList %>
        
            
                    <% include SilverStripe\\Blog\\PostSummary %>
                    <% end_loop %>
                    <% else %>
                    <p><%t SilverStripe\\Blog\\Model\\Blog.NoPosts 'There are no blogs' %></p>
                    <% end_if %>

                </div>


                <% with $PaginatedList %>
                <% include SilverStripe\\Blog\\Pagination %>
                <% end_with %>


            </div>

            <%-- <div class="col-lg-4">
 <% include SilverStripe\\Blog\\BlogSideBar %>
        </div> --%>

    </div>

    </div>
</section>
</section>