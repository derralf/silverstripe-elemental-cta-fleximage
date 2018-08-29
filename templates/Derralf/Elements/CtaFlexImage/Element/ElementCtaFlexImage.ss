<div class="side-by-side Ximage-right $Color <% if not $Image %>no-image<% end_if %>">
    <% if $Image %>
        <div class="side cover-image" style="background-image:url({$Image.Link}); {$ImageBgPosition}"></div>
    <% end_if %>
    <div class="side cont">
        <div class="inner">
            <% if $Title && $ShowTitle %>
                <div class="side-title">
                    <% include Derralf\\Elements\\CtaFlexImage\\Title %>
                </div>
            <% end_if %>
            <% if $HTML %>
                <div class="side-text">
                    $HTML
                </div>
            <% end_if %>

            <% if $ReadMoreLink.LinkURL %>
                <div class="side-btn">
                    <p><a href="$ReadMoreLink.LinkURL" class="{$ReadmoreLinkClass}" {$ReadMoreLink.TargetAttr} ><% if $ReadMoreLink.Title %>$ReadMoreLink.Title<% else %> mehr<% end_if %></a></p>
                </div>
            <% end_if %>
        </div>
    </div>
</div>
