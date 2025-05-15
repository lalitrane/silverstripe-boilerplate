<% if $SiteConfig.NavVariation == 'two'%>


<nav class="navbar grad classic transparent navbar-light hovertrigger">

    <div class="logorow container">
        <div class=" flex-lg-row flex-nowrap align-items-center">
            <div class="navbar-brand w-100">
                <a href="$BaseHref" class="brand">
                    <% if $SiteConfig.Logo_Dark %>
                    <img class="py-2" src="$SiteConfig.Logo_Dark.URL" title="$SiteConfig.Logo_Dark.Title"
                        alt="$SiteConfig.Logo_Dark.Title" />

                    <% end_if %>
                </a>
            </div>

        </div>

        <div class="d-flex flex-column ms-auto">

            <div class="searchblockcontainer ">

                <% loop topmenus %>
                <li class="$FirstLast $LinkingMode nav-item d-none d-lg-block"><a href="$Link"
                        title="Go to the $Title.XML page" class=""><span>$MenuTitle.XML</span></a>
                </li>
                <% end_loop %>
                <% if $SiteConfig.PhoneNumber %>

                <a class="" href="tel:$SiteConfig.PhoneNumber "><span
                        class="d-none d-md-block font-medium">$SiteConfig.PhoneNumber</span> <i
                        class="bi bi-telephone-fill d-block d-md-none"></i> </a>
                <% end_if %>
                <div class="searchblock">
                    <label for="searchToggle" class="searchIcon"><i class="bi bi-search"></i></label>
                    <form $SearchForm.AttributesHTML>
                        $SearchForm
                    </form>
                </div>
            </div>

            <div class="container desktop-border-top pt-3 px-2 pb-3 ">
                <ul class="navbar-nav d-none d-lg-flex flex-row ms-auto">

                    <% loop $Menu(1) %>

                    <li class="$LinkingMode nav-item scrollto  <% if $Children %>dropdown <% end_if %>"><a
                            href="$Link" title="$Title.XML"
                            class="nav-link <% if $Children %>dropdown-toggle <% end_if %>">$MenuTitle.XML
                        </a>
                        <% if $Children %>
                        <ul class="dropdown-menu">
                            <% loop $Children %>
                            <li
                                class="nav-item dropdown <% if $isCurrent %>current<% else_if $isSection %>section<% end_if %>">
                                <a href="$Link" class="nav-link ">$MenuTitle <% if $Children %><% end_if %></a>
                            </li>
                            <% end_loop %>

                        </ul>
                        <% end_if %>

                    </li>

                    <% end_loop %>
                </ul>

                <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start bluegradvertical">
                    <div class="offcanvas-header d-lg-none">
                        <a href="$BaseHref" class="brand site-logo d-block py-4" rel="home">

                            <% if $SiteConfig.Logo_Dark %>
                            <img class="py-2" src="$SiteConfig.Logo_Dark.URL" />

                            <% end_if %>

                        </a>


                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>


                    <div class="offcanvas-body  h-100">
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
                                        <a href="$Link" class="nav-link ">$MenuTitle <% if $Children %>
                                            <% end_if %></a>
                                    </li>
                                    <% end_loop %>

                                </ul>
                                <% end_if %>

                            </li>

                            <% end_loop %>


                        </ul>


                        <!-- /.navbar-nav -->


                    </div>

                    <!-- /.offcanvas-body -->
                </div>
                <!-- /.navbar-collapse -->
             <!--   <div class="navbar-other">
                    <ul class="navbar-nav flex-row align-items-center ms-auto">

                        <li class="nav-item d-lg-none">
                            <button class="hamburger offcanvas-nav-btn"><span></span></button>
                        </li>

                    </ul>

                </div>-->
                <!-- /.navbar-other -->

            </div>


        </div>


        <div class="searchcol">
            <button class="hamburger mobileonlyham offcanvas-nav-btn"><span></span></button>
        </div>
    

    </div>




    <!-- /.container -->

</nav>


<% else %>
    <!-- /.Single Row -->

<nav
    class="single-rownav navbar  navbar-expand-lg classic transparent <% with SiteConfig %><% if $ThemeVariation == 'light' %> navbar-light <% else %> navbar-dark <% end_if %><% end_with %>">
    <div class="container flex-lg-row flex-nowrap align-items-center">
        <div class="navbar-brand ">
            <a href="$BaseHref">

                <% if $SiteConfig.ThemeVariation == 'dark'%>
                <% if $SiteConfig.Logo_Light %>
                <img class="py-2" src="$SiteConfig.Logo_Light.URL" />
                <% else %>
                $SiteConfig.Title
                <% end_if %>

                <% else %>
                <% if $SiteConfig.Logo_Dark %>
                <img class="py-2" src="$SiteConfig.Logo_Dark.URL" />
                <% else %>
                $SiteConfig.Title
                <% end_if %>

                <% end_if %>
            </a>
        </div>
        <div class="navbar-collapse bg-light offcanvas offcanvas-nav offcanvas-start">
            <div class="offcanvas-header d-lg-none">
                <a href="$BaseHref" class="brand site-logo d-block py-4" rel="home">

                    <% if $SiteConfig.ThemeVariation == 'dark'%>
                    <% if $SiteConfig.Logo_Light %>
                    <img class="py-2" src="$SiteConfig.Logo_Light.URL" />
                    <% else %>
                    $SiteConfig.Title
                    <% end_if %>

                    <% else %>
                    <% if $SiteConfig.Logo_Dark %>
                    <img class="py-2" src="$SiteConfig.Logo_Dark.URL" />
                    <% else %>
                    $SiteConfig.Title
                    <% end_if %>

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
                                    <% if $Children %><i class="bi bi-chevron-right"></i> <% end_if %></a>
                            </li>
                            <% end_loop %>

                        </ul>
                        <% end_if %>

                    </li>

                    <% end_loop %>
                </ul>



            </div>
            <!-- /.offcanvas-body -->

            <%-- <div class="navbar-other ms-lg-4">
                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <% loop topmenus %>
                    <li class="$FirstLast $LinkingMode nav-item d-none d-lg-block"><a href="$Link"
                            title="Go to the $Title.XML page"
                            class=""><span>$MenuTitle.XML</span></a>
                    </li>
                    <% end_loop %>
                </ul>
           

                <div class="searchblock ">
                    <label for="searchToggle" class="searchIcon"><i class="bi bi-search"></i></label>
                    <form $SearchForm.AttributesHTML>
                        $SearchForm
                    </form>
                </div>
            </div> --%>
            <!-- /.navbar-other -->

        </div>

  <div class="searchblockcontainer ">

                <% loop topmenus %>
                <li class="$FirstLast $LinkingMode nav-item d-none d-lg-block"><a href="$Link"
                        title="Go to the $Title.XML page" class=""><span>$MenuTitle.XML</span></a>
                </li>
                <% end_loop %>
                <% if $SiteConfig.PhoneNumber %>

                <a class="" href="tel:$SiteConfig.PhoneNumber "><span
                        class="d-none d-md-block font-medium">$SiteConfig.PhoneNumber</span> <i
                        class="bi bi-telephone-fill d-block d-md-none"></i> </a>
                <% end_if %>
                <div class="searchblock">
                    <label for="searchToggle" class="searchIcon"><i class="bi bi-search"></i></label>
                    <form $SearchForm.AttributesHTML>
                        $SearchForm
                    </form>
                </div>
            </div>
        <div class="searchcol">
            <button class="hamburger mobileonlyham offcanvas-nav-btn"><span></span></button>
        </div>
    
    </div>
    <!-- /.container -->
</nav>

<% end_if %>
