 <% if Query %>
   <div class="container my-5"> <h1>Search results for: "$Query"</h1>

  <% if $Results.Count > 0 %>
        <p>Found $Results.Count results.</p>
    <% loop Results %>
        <h2><a href="$Link">$Title</a></h2>
        <p>$Content.LimitCharacters(150)</p>
    <% end_loop %>

    <% else %>
        <p>No results found for your search.</p>
    <% end_if %>
        </div>
<% else %>
   <div class="container">
    <p>No search query entered.</p>
    </div>
<% end_if %>
