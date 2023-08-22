<p class="blog-post-meta">
    <%-- <% if $Categories.exists %>
    <%t SilverStripe\\Blog\\Model\\Blog.PostedIn "Posted in" %>
    <% loop $Categories %>
    <a href="$Link" title="$Title">$Title</a><% if not Last %>, <% else %>;<% end_if %>
    <% end_loop %>
    <% end_if %>

    <% if $Tags.exists %>
    <%t SilverStripe\\Blog\\Model\\Blog.Tagged "Tagged" %>
    <% loop $Tags %>
    <a href="$Link" title="$Title">$Title</a><% if not Last %>, <% else %>;<% end_if %>
    <% end_loop %>
    <% end_if %>

    <% if $Comments.exists %>
    <a href="{$Link}#comments-holder">
        <%t SilverStripe\\Blog\\Model\\Blog.Comments "Comments" %>
        $Comments.count
    </a>;
    <% end_if %> --%>



    <% if $Credits %>
    <%-- <%t SilverStripe\\Blog\\Model\\Blog.By "by" %> --%>

    <% loop $Credits %>
    <% if not $First && not $Last %>, <% end_if %>
    <% if not $First && $Last %> <%t SilverStripe\\Blog\\Model\\Blog.AND "and" %> <% end_if %>
    <%-- <% if $URLSegment && not $Up.ProfilesDisabled %> --%>
    <% if not $Up.ProfilesDisabled %>
<div class="d-flex justify-content-between my-5 mt-4">
    <div class="profileblock d-none">
        <div class="profile-image ">
            $BlogProfileImage.Fill(100,100)
        </div>
        <div class="">
            <div class="ms-3 d-flex flex-column">
<a href="$URL" class="fw-bold fs-4 text-decoration-none">$Name.XML</a>

                $BlogProfileSummary
                </a>
            </div>
        </div>

    </div>
        <div class="socialshare text-center">
        <h3>Share</h3>
<div class="shareicons">
        <a href="http://twitter.com/share?url={$BaseHref}posts/$Top.URLSegment" target="_blank" class="fs-2"><i class="bi bi-twitter"></i></a>
   
    <a href="https://www.facebook.com/share.php?u={$BaseHref}posts/$Top.URLSegment" target="_blank" class="fs-2">
    <i class="bi bi-facebook"></i> </a>
<a href="https://www.linkedin.com/sharing/share-offsite/?url={$BaseHref}posts/$Top.URLSegment"
    target="_blank" class="fs-2">
<i class="bi bi-linkedin"></i>
</a>
</div>
        </div>
    </div>
    <% else %>
    $Name.XML
    <% end_if %>
    <% end_loop %>
    <% end_if %>

    <%-- <% if $MinutesToRead < 1 %>
    <%t SilverStripe\\Blog\\Model\\Blog.LessThanAMinuteToRead "Less than a minute to read" %>
    <% else %>
    $MinutesToRead <%t SilverStripe\\Blog\\Model\\Blog.MinutesToRead "Minute(s) to read" %>
    <% end_if %> --%>
    </p>
