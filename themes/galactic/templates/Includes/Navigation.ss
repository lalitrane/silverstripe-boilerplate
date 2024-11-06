<nav class="navbar navbar-expand-lg classic transparent navbar-light">
    <div class="container flex-lg-row flex-nowrap align-items-center">
        <div class="navbar-brand w-100">
            <a href="$BaseHref">
                <% if $SiteConfig.Logo_Dark %>
                <img class="py-2" src="$SiteConfig.Logo_Dark.URL" />
                <% else %>
                $SiteConfig.Title
                <% end_if %>
            </a>
        </div>
        <div class="navbar-collapse bg-light offcanvas offcanvas-nav offcanvas-start">
            <div class="offcanvas-header d-lg-none">
                <a href="$BaseHref" class="brand site-logo d-block py-4" rel="home">

                    <% if $SiteConfig.Logo_Dark %>
                    <img class="py-2" src="$SiteConfig.Logo_Dark.URL" />

                    <% else %>
                    $SiteConfig.Title
                    <% end_if %>

                </a>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
                <ul class="navbar-nav">

                    <% loop $Menu(1) %>

                    <li class="$LinkingMode nav-item scrollto  <% if $Children %>dropdown <% end_if %>"><a
                            href="$Link" title="$Title.XML"
                            class="nav-link <% if $Children %>dropdown-toggle <% end_if %>">$MenuTitle.XML </a>
                        <% if $Children %>
                        <ul class="dropdown-menu">
                            <% loop $Children %>
                            <li
                                class="nav-item dropdown <% if $isCurrent %>current<% else_if $isSection %>section<% end_if %>">
                                <a href="$Link"
                                    class="nav-link <% if $Children %>dropdown-toggle <% end_if %>">$MenuTitle
                                    <% if $Children %><i class="bi bi-chevron-right"></i> <% end_if %></a></li>
                            <% end_loop %>

                        </ul>
                        <% end_if %>

                    </li>

                    <% end_loop %>
                </ul>


                <!-- /.navbar-nav -->
                <div class="offcanvas-footer d-lg-none">
                    <div>
                        <a href="mailto:first.last@email.com" class="link-inverse">info@email.com</a>
                        <br /> 00 (123) 456 78 90 <br />
                        <nav class="nav social social-white mt-4">
                            <a href="#"><i class="uil uil-twitter"></i></a>


                        </nav>
                        <!-- /.social -->
                    </div>
                </div>
                <!-- /.offcanvas-footer -->
            </div>
            <!-- /.offcanvas-body -->
        </div>
        <!-- /.navbar-collapse -->
        <div class="navbar-other ms-lg-4">
            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <% loop topmenus %>
                <li class="$FirstLast $LinkingMode nav-item d-none d-lg-block"><a href="$Link"
                        title="Go to the $Title.XML page" class="btn btn-sm btn-dark"><span>$MenuTitle.XML</span></a>
                </li>
                <%-- <li class="nav-item d-none d-lg-block">

            <a href="#" class="btn btn-sm btn-primary rounded">$Title</a>
          </li> --%>
                <% end_loop %>
                <li class="nav-item d-lg-none">
                    <button class="hamburger offcanvas-nav-btn"><span></span></button>
                </li>
            </ul>
            <!-- /.navbar-nav -->
        </div>
        <!-- /.navbar-other -->
    </div>
    <!-- /.container -->
</nav>
