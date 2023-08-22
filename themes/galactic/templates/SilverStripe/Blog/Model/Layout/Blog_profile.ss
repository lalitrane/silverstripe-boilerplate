<%-- <% require css('silverstripe/blog: client/dist/styles/main.css') %> --%>

<div class="blog-entry container mt-4 <% if $SideBarView %>unit size3of4<% end_if %>">

	<% include SilverStripe\\Blog\\MemberDetails %>

	<% if $PaginatedList.Exists %>
        <h2><%t SilverStripe\\Blog\\Model\\Blog.PostsByUser 'Posts by {firstname} {surname} for {title}' firstname=$CurrentProfile.FirstName surname=$CurrentProfile.Surname title=$Title %></h2>
		<div class="row">
			<% loop $PaginatedList %>
				
			<% include SilverStripe\\Blog\\PostSummary %>
		<% end_loop %>
	</div>
	<% end_if %>



	<% with $PaginatedList %>
		<% include SilverStripe\\Blog\\Pagination %>
	<% end_with %>

</div>

<%-- <% include SilverStripe\\Blog\\BlogSideBar %> --%>
