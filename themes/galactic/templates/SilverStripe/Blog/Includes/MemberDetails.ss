<section class="d-flex py-3">
	<div class="profile-image">
		$profile.BlogProfileImage.ScaleWidth(180)
	</div>

	<div class="ms-3">
		<%-- <% if $CurrentProfile.BlogProfileImage %> --%>
			<h1>$CurrentProfile.FirstName $CurrentProfile.Surname</h1>

		<%-- <% end_if %> --%>
		<div class="profile-summary d-flex flex-column">
			<p>$CurrentProfile.BlogProfileSummary</p>
		</div>
	</div>
</section>




