<?php

Class Code {
    var $repos = array();
    var $gitUrlFront = "https://github.com/gregsandell/";
    function loadData() {
        $this->addRepo("estimates", "Angular Transactional Form Sample",
            "This is an example of web form written in Angular, demonstrating usage of Templates, Controllers, Services, Routes, Directives, LESS, HTTP service mocking with API Blueprint, Internationalization, and testing with Mocha/Sinon/Chai."
        );
        $this->addRepo("CoffeeShop", "Java 'Coffee Shop'",
            "This is a Java coding sample I wrote on request.  It command-line menu-driven app that simulates the sales and inventory of a coffeeshop.  For example, Cafe Mocha appears on the menu only when the ingredients are available in inventory.  As you sell more Cafe Mochas, the ingredient store decrements until you can't sell any more.  I used Java Enums extensively to represent the inventory."
        );
        $this->addRepo("data-grid", "Open Source project:  Data Grid Rotator",
            "This is a javascript object that supports flipping x- and y-axes of data, and supports rotating data over a collection of charts. I am actively at work to release this as an open source tool."
        );
        $this->addRepo("replaceWordsInPage", "Replace Words in Page",
            "This is a jQuery coding sample I wrote on request.  It demonstrates Screen-scraping of Wikipedia pages, Word-counting, Sorting, the Module pattern, Promises, Replacing text in an HTML page, rules definitions through predicates, and CSS selectors."
        );
        $this->addRepo("analyze-characters", "Perl code sample",
            "At iCrossing we frequently received XML file feeds from clients which contained characters of mixed formats, instead of pure ASCII.  Mixed in with plain ASCII we might find WinLatin-1, ISO-8859-1, extended ASCII, or UTF-8.  This script analyzes every character to give a tally of how many of each character set type are present."
        );
        $this->addRepo("right-left-select", "jQuery plugin",
            "This is a jQuery plugin I wrote for a UI element that moves text items from one container to another."
        );
    }

    function addRepo($repoName, $title, $desc) {
        array_push($this->repos, new Repo($repoName, $title, $desc));
    }
}

Class Repo {
    var $repoName;
    var $title;
    var $desc;
    function Repo($repoName, $title, $desc) {
        $this->repoName = $repoName;
        $this->title = $title;
        $this->desc = $desc;
    }
}

?>