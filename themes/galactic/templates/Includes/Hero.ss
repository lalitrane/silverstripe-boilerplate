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
            <br><span>$Subtitle</span>
        </h1>
	</div>
	</div>
    </div>

</div>

<% else %>

<div class="offset-nav">
    <Div class="container nobanner">
        <h1>
            <% if $Alttitle %>
            $Alttitle
            <% else %>
            $Title
            <% end_if %>
        </h1>
    </div>
</div>
<% end_if %>
