<div class="col-lg-4">
<div class="post-summary">

	<div class="post-image">
		<a class="post-image" href="$Link" title="<%t SilverStripe\\Blog\\Model\\Blog.ReadMoreAbout "Read more about '{title}'..." title=$Title %>">

			<% if $FeaturedImage %>
			$FeaturedImage.ScaleWidth(795)
			<% else %>
				$HeroImage.ScaleWidth(795)
				<%-- <img src="$HeroImage.Link" class="img-fluid"/> --%>
			<% end_if %>
		</a>
		
	</div>
	<h2>
		<a href="$Link" title="<%t SilverStripe\\Blog\\Model\\Blog.ReadMoreAbout "Read more about '{title}'..." title=$Title %>">
			<% if $MenuTitle %>$MenuTitle
			<% else %>$Title<% end_if %>
		</a>
	</h2>


	<% if $Summary %>
		$Summary
	<% else %>
		<p>$Excerpt</p>
	<% end_if %>
	    <p>
			<%-- <a href="$Link">
				Read More
			</a> --%>
		</p>
<!-- Social sharing -->
	<%-- <% include SilverStripe\\Blog\\EntryMeta %> --%>
</div>
</div>
