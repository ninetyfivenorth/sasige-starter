<?php

namespace Nullix\Sasige;

$page = Page::getCurrent();
$page->setPageTitle("Sasige - Static Site Generator");
$page->setLeadText("Simple, lightning fast, text to websites and blogs.");
$page->setDate("2017-01-02");
$page->setLabel("Home");
$page->setSort(1);
$page->setTags(["site", "navigation"]);
$page->setThemeTemplate("site");
$page->setContentByMarkdownFileSelf();
