
		<div class="container breadcrumbsdiv">
	$Breadcrumbs

		</div>
<!-- BEGIN CONTENT WRAPPER -->
<div class="content">
	<div class="container">
		<div class="row">

			<!-- BEGIN MAIN CONTENT -->
			<div class="main col-sm-8">
			
				<h1 class="blog-title">$Title</h1>
				
		
				<div class="blog-bottom-info">
				
				</div>
				
				<div class="post-content">
					$Content
				</div>
				
				<div class="share-wraper col-sm-12 clearfix">
				

					
					<a class="print-button" href="javascript:window.print();">
						<i class="fa fa-print"></i>
					</a>
				</div>
				<% if $Document %>
				<div class="row">
					<% with $Document %>
					<div class="col-sm-12">
						<a href="$URL" class="btn btn-warning btn-block"><i class="fa fa-download"></i> Download brochure [$Extension] ($Size)</a>					
					</div>
					<% end_with %>
				</div>
				<% end_if %>
				
	
				
			
				
			</div>	
			<!-- END MAIN CONTENT -->
			
		

		</div>
	</div>
</div>