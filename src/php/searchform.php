<div id="nav-search-form">
    <form role="search" style="display: table-cell; width: 100%;" method="get" action="<?= home_url('/'); ?>">
        <input type="search" name="s" placeholder="検索" value="<?= get_search_query() ?>">
    </form>
    <div style="display: table-cell;"><span id="search-cancel-link">キャンセル</span></div>
</div>
<form id="search-form" class="form-inline" role="search" method="get" action="<?= home_url('/'); ?>">
    <input type="search" id="search-box" name="s" placeholder="検索" value="<?= get_search_query() ?>" class="form-control">
    <i id="search-form-icon" class="fa fa-search"></i>
</form>
