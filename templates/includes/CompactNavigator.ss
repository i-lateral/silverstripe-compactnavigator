<div id="CN_CompactNavigator">
	<div id="CN_NavigatorDetails">
		<p id="CN_PageType">
			<% if DisplayMode == Stage %>
				<span title='This message will not be shown to your visitors'>Draft Site</span>
			<% else_if DisplayMode == Live %>
				<span title='This message will not be shown to your visitors'>Published Site</span>
			<% else_if DisplayMode == Archived %>
				<span title='This message will not be shown to your visitors'>Archived Site<br/>$ArDate.Nice</span>
			<% end_if %>
		</p>
		
		<ul id="CN_SwitchView">
			<li>Page Options:</li>
			<li><a href="$adminLink" target="cms">Admin Area</a></li>
			<li><a href="$cmsLink/$ID" target="cms">Edit this Page</a></li>
			
			<% if DisplayMode == Stage %>
			<li><a target="site" style="left : -1px;" href="$Link?stage=Live">View Published Site</a></li>
			
			<% else_if DisplayMode == Live %>
			<li><a target="site" style="left : -1px;" href="$Link?stage=Stage">View Draft Site</a></li>
			
			<% else_if DisplayMode == Archived %>
			<li><a target="site" style="left : -1px;" href="$Link?stage=Stage">View Draft Site</a></li>
			<li><a target="site" style="left : -1px;" href="$Link?stage=Live">View Published Site</a></li>
			
			<% end_if %>
		</ul>
		
		<p id="CN_Credentials">
			<% if CurrentMember %><% control CurrentMember %>
				Logged in as $FirstName<br/>
				<a href="Security/logout">Log out</a>
			<% end_control %><% else %>
				Not logged in - <a href="Security/login" id="LoginLink">log in</a>
			<% end_if %>
		</p>
	</div>
</div>

<div id="CN_ShowHide"><img src="compactnavigator/images/silverstripelogo.png" alt=" " /></div>