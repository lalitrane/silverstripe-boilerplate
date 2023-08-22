
<% if $HeroImage %>

    <div style="background-image:url($HeroImage.Link)" class="offset-nav herobanner">

        <div class="container banneralign">
            <div class="row">
    <div class="col-lg-4 col-sm-12">



            <h1 class="text-white pagetitle">

                <% if $Alttitle %>
                $Alttitle
                <% else %>
                $Title
                <% end_if %>
                <br><span>$Subtitle</span>
            </h1>
        </div>
        </div>
        </div>

    </div>

    <% else %>

	<div style="background-image:url($FeaturedImage.Link)" class="offset-nav herobanner">

        <div class="container banneralign">
            <div class="row">
   		 <div class="col-lg-4 col-sm-12">



            <h1 class="text-white pagetitle">

                <% if $Alttitle %>
                $Alttitle
                <% else %>
                $Title
                <% end_if %>
                <br><span>$Subtitle</span>
            </h1>
        </div>
        </div>
        </div>

    </div>



<% end_if %>


<div class="container mt-5 ">
<div class="row">
	<div class="col-lg-8 blog-entry ">
<h1>$Title</h1>

	<div class="breadcrumbsdivnew mb-3">
		

	<%-- <a href="/events-and-news/" class="breadcrumb-1">News</a> » $Title --%>


	
			</div>
	<div class="breadcrumbsdiv">
		$Breadcrumbs
	
			</div> <br>
			<%-- <%t SilverStripe\\Blog\\Model\\Blog.Posted "Posted" %> --%>
			<i class="bi bi-calendar3"></i>
			<a href="$MonthlyArchiveLink">$PublishDate.ago</a>
		<div class="content">$Content</div>
		<% include SilverStripe\\Blog\\MemberDetails %>
		<% include SilverStripe\\Blog\\EntryMeta %>

		
	</div>

	<div class="col-lg-3 blogsidebar offset-lg-1">
		<%-- <h3>Categories</h3>
<ul>
		<% loop $Categories %>

			<% if $Title != 'News' %>
				<li>
			<a href="$link">$Title</a></li>
	<% end_if %>
		<% end_loop %>
	</ul> --%>
	<h3>Recent Blogs</h3>
	<ul>

	<% loop AllBlogPosts.Limit(5) %>

		<li>
		<a href="$link">$Title</a></li>

	<% end_loop %>

	
	</ul>
</div>
	</div>
</div>


