<?php
	// Source: http://api.drupal.org/api/file/modules/node/node.tpl.php/6/source

	/**
	 * @file node.tpl.php
	 *
	 * Theme implementation to display a node.
	 *
	 * Available variables:
	 * - $title: the (sanitized) title of the node.
	 * - $content: Node body or teaser depending on $teaser flag.
	 * - $picture: The authors picture of the node output from
	 *   theme_user_picture().
	 * - $date: Formatted creation date (use $created to reformat with
	 *   format_date()).
	 * - $links: Themed links like "Read more", "Add new comment", etc. output
	 *   from theme_links().
	 * - $name: Themed username of node author output from theme_user().
	 * - $node_url: Direct url of the current node.
	 * - $terms: the themed list of taxonomy term links output from theme_links().
	 * - $submitted: themed submission information output from
	 *   theme_node_submitted().
	 *
	 * Other variables:
	 * - $node: Full node object. Contains data that may not be safe.
	 * - $type: Node type, i.e. story, page, blog, etc.
	 * - $comment_count: Number of comments attached to the node.
	 * - $uid: User ID of the node author.
	 * - $created: Time the node was published formatted in Unix timestamp.
	 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
	 *   teaser listings.
	 * - $id: Position of the node. Increments each time it's output.
	 *
	 * Node status variables:
	 * - $teaser: Flag for the teaser state.
	 * - $page: Flag for the full page state.
	 * - $promote: Flag for front page promotion state.
	 * - $sticky: Flags for sticky post setting.
	 * - $status: Flag for published status.
	 * - $comment: State of comment settings for the node.
	 * - $readmore: Flags true if the teaser content of the node cannot hold the
	 *   main body content.
	 * - $is_front: Flags true when presented in the front page.
	 * - $logged_in: Flags true when the current user is a logged-in member.
	 * - $is_admin: Flags true when the current user is an administrator.
	 *
	 * @see template_preprocess()
	 * @see template_preprocess_node()
	 */
?><div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> clear-block">
	<?php print $picture; ?>
	<?php if (!$page && $title != ''): ?>
		<h2><a href="<?php print $node_url; ?>" title="<?php print $title; ?>"><?php print $title; ?></a></h2>
	<?php endif; ?>
  <?php print $links; ?>
	<div class="meta">
		<?php if ($terms): ?>
			<div class="terms terms-inline"><?php print $terms; ?></div>
		<?php endif; ?>
	</div>
	<div class="content">
    <?php if ($field_date): ?>
  		<div class="field field-type-datetime field-field-date">
  	  	<div class="field-items">
  	   		<?php if ($field_recurring): ?>
  	   		<div class="field-field-recurring"><? print $field_recurring[0]['safe']; ?></div>
  	   		<div class="time-display"><?php print $from_time; if($to_time): print ' - '. $to_time; endif;?></div>
  	   		<?php else: ?>
  	   		<div class="date-display"><?php print $from_date; if($to_date): print ' - '. $to_date; endif;?></div>
  	   		<div class="time-display"><?php print $from_time; if($to_time): print ' - '. $to_time; endif;?></div>
  	   		<?php endif; ?>
  			</div>
  		</div>
  	<?php endif; ?>
		
		<?php if($field_event_location[0]['lid']): ?>
			<h2>Address</h2>
			<div class="location vcard field">
				<div class="adr"> <span class="fn"></span> 
				<div class="street-address"><?php print $field_event_location[0]['street'] ?></div> 
				<span class="locality"><?php print $field_event_location[0]['city'] ?></span> 
				<span class="postal-code"><?php print $field_event_location[0]['postal_code'] ?></span>
				<div class="country-name"><?php print $field_event_location[0]['country_name'] ?></div>
				</div> <!-- // close adr -->
			<div class="map-link"><?php print $maplink; ?></div> 
			</div> <!-- // close location vcard -->
		<?php endif; ?>

		
		<?php // print $field_event_location[0]['view']; ?>
		
		<?php if ($node->content['body']['#value']): ?> 
			<div class="resource_body field">
				<?php print $node->content['body']['#value']; ?>
			</div>
		<?php endif; ?>

    <?php if($signup == 1): print $node->content['signup']['#value']; endif; ?>		
	</div>
    <?php dcpr($node); ?>
</div>
