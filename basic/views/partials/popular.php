<div class="widget widget--popular">
    <h2 class="widget__header">Популярные статьи</h2>
    <? use yii\helpers\StringHelper;

    foreach($popular as $article) { ?>

        <aside class="widget__article"><a href="<?='/blog/article/?id=' . $article->id?>" class="widget__article-header"><?= StringHelper::truncate($article->title,100,'...')?></a>
            <p class="widget__article-data">
                <span class="widget__article-date"><?=$article->date?> </span>
                <a class="widget__article-author">Анонимус</a>
            </p>
        </aside>
    <? } ?>
</div>