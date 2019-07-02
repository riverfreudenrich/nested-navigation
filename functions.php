function gh_get_top_parent_page_id() {
    global $post;
    $ancestors = $post->ancestors;
    // Check if page is a child page (any level)
    if ($ancestors) {
        //  Grab the ID of top-level page from the tree
        return end($ancestors);
    } else {
        // Page is the top level, so use  it's own id
        return $post->ID;
    }
}
