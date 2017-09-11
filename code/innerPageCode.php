<?php
    $_cpath = $_SERVER['DOCUMENT_ROOT'];
    $g_title = 'Greg Sandell - Code Samples';
	include($_cpath . "/code/objGitRepos.php");
	$code = new Code();
	$code->loadData();
	$extArrow = '<img src="/image/wikipediaExternalPage.png" alt="External Page" border="0">';

    ?>
<header>
    <h1>Code</h1>
    <p>
        Here are some code samples hosted on GitHub.
    <p/>
</header>
<section>
    <dl>
    <?php
        foreach ($code->repos as $repo) { ?>
            <dt>
                <a href="<?php print($code->gitUrlFront) ?>/<?php print($repo->repoName) ?>" rel="ext"><?php print($repo->title) ?>&nbsp;<?php print($extArrow) ?></a>
            </dt>
            <dd><?php print($repo->desc) ?></dd>
            <br> <?php
        }
    ?>
    </dl>
</section>
