<% require css('components/font-awesome/css/font-awesome.min.css') %>
<% require css('skirting-board/css/style.min.css') %>
<% require javascript('components/jquery/jquery.min.js') %>
<% require javascript('skirting-board/js/main.js') %>
<nav class="sb-nav right">
	<div class="sb-head">
		<div class="panel">
			<i class="sb-menu-toggle fa fa-bars" aria-hidden="true"></i>
		</div>
	</div>
	<div class="panel sb-body">
        <% control $Menu %>
			<ul class="sb-menu">
				<li>
					<a href="$Link" class="grand-parent">
                        <span class="sb-menu-title sb-unit"><% if $Unit %>$Unit<% else %>$Pos<% end_if %></span>
                        <span class="sb-menu-title sb-text">$MenuTitle</span>
                    </a>
                    <% if $Children %>
						<ul>
                            <% control $Children %>
								<li>
									<a href="$Link" class="parent">
										<span class="sb-menu-title sb-unit"><% if $Unit %>$Unit<% else %>$Pos<% end_if %></span>
										<span class="sb-menu-title sb-text">$MenuTitle</span>
                                    </a>
								</li>
                            <% end_control %>
						</ul>
                    <% end_if %>
				</li>
			</ul>
        <% end_control %>
	</div>
</nav>
<div class="sb-hamburger">
    <div class="container">
		<i class="sb-menu-toggle fa fa-bars" aria-hidden="true"></i>
    </div>
</div>