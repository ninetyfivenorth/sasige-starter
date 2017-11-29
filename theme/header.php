<?php
namespace Nullix\Sasige;

$page = Page::getCurrent();

$pageset = new Pageset();
$pageset->includePagesByTags(["navigation"]);
$pageset->filterPagesByLanguage($page->getLanguage());
$pageset->setOrderBy("+sort");

$leadText = $page->getLeadText();

?>
<!DOCTYPE html>
<html lang="<?= $page->getLanguage() ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= $page->getLeadText() ?>">
    <meta name="author" content="Sasige">
    <title><?= $page->getPageTitle() ?></title>
    <link href="<?= $page->getThemeCssUrl(["stylesheets/page.scss"]) ?>" rel="stylesheet">
</head>
<body>
<header>
    <div class="page">
        <h1 class="pagetitle"><?= $page->getPageTitle() ?></h1>
    </div>
</header>
<nav>
    <?php
    $pageset = new Pageset();
    $pageset->includePagesByTags(Theme::getOption("navigationPagesetTags"));
    $pageset->filterPagesByLanguage($page->getLanguage());
    $pageset->setOrderBy("+sort");
    echo $pageset->getHtmlListRecursive();
    ?>
</nav>

<div class="page">