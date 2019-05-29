<div id="nav-top">
	<div class="container">
	<?php $ancestor_id = gh_get_top_parent_page_id(); $descendants = get_pages(array('child_of' => $ancestor_id, 'parent' => $ancestor_id)); if ($descendants && !is_404() && $ancestor_id != 0) : ?>
	<ul>
	<?php wp_list_pages(
		array(
			"child_of"    => $ancestor_id,
			"depth"       => 2,
			"link_before" => "",
			"title_li"    => "",
			"sort_column" => "menu_order",
			'parent'      => $ancestor_id
		)
	); ?>
	</ul>
	<?php endif; ?>
	</div>
</div>

<?php if ($ancestor_id != $post->ID) : $children = get_pages(array('child_of' => $post->ID, 'parent' => $post->ID, 'sort_order' => 'asc', 'sort_column' => 'menu_order')); if ($children) : ?>

<div id="nav-middle">
	<div class="container">
		<ul>
			<?php foreach ($children as $child) : ?>
				<li class="<?= ($child->ID == $post->post_parent) ? "current_page_item" : ""; ?> <?= ($child->ID == $post->ID) ? "current_page_item" : ""; ?>">
					<a href="<?= get_the_permalink($child->ID) ?>"><?= $child->post_title ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>

<?php else : if ($ancestor_id != $post->post_parent) : $children = get_pages(array('child_of' => $post->post_parent, 'parent' => $post->post_parent, 'sort_order' => 'asc', 'sort_column' => 'menu_order')); if ($children) : ?>

<div id="nav-bottom">
	<div class="container">
		<ul>
			<?php foreach ($children as $child) : ?>
				<li class="<?= ($child->ID == $post->post_parent) ? "current_page_item" : ""; ?> <?= ($child->ID == $post->ID) ? "current_page_item" : ""; ?>">
					<a href="<?= get_the_permalink($child->ID) ?>"><?= $child->post_title ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>

<?php endif; endif; ?>
<?php endif; endif; ?>
