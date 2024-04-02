<% include Hero %>
<!-- BEGIN CONTENT WRAPPER -->
<div class="content">
    <div class="container">
        <div class="row">
$Content

            <!-- BEGIN MAIN CONTENT -->
            <div class="main <% if $SideBarView %>col-sm-12<% end_if %>">
                <div class="list-style clearfix">
                    <div class="row">
                        <% loop $Children %>
						<div class="col-lg-3 col-md-3">
                        <div class="item peoplecolumn p-2">
                  $Title
                            <% if $Position %>
                            <div class="image">
                                <img src="$Photo.Link" class="img-fluid">

                            </div>
                            <% end_if %>
                            <h3>
                                <a href="$Link" class="text-primary">$Title</a>
                            </h3>
                            <% if $Position %>
                            <p class="text-primary">$Position</p>
                            <% end_if %>
                            <% if $Phonenumber %>
                            <p class="text-primary">$Phonenumber</p>


                            <% end_if %>
                            <% if $Email %>
                            <a class="text-primary" href="mailto:$Email">$Email</a>
                            <% end_if %>


                            <% if $Blurb %>
                            <p class="text-primary">$Blurb</p>
                            <% end_if %>
                            <a href="$Link" class="d-block">
                                <span class="btn bg-secondary mainfs">View disclosure statement here</span>
                            </a>
						</div>
                        </div>
                        <% end_loop %>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->




        </div>
    </div>
</div>
