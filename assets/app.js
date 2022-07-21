/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// start the Stimulus application
import './bootstrap';
import 'jquery'
import 'bootstrap'
import 'datatables.net-bs5'
import 'datatables.net-rowreorder';
import 'datatables.net-rowreorder-bs5';
import './styles/app.scss';

const $ = require('jquery');
Window.prototype.$ = $;

const TomSelect = require('tom-select');

$(function () {
    $('#items-table').DataTable({rowReorder: true});
    $('#expense_inbox_table').DataTable({rowReorder: true});

    // BOF: tray
    $('#tray-btn').click(function () {
        var trayNav = $('#tray .nav');
        trayNav.toggle();
        document.cookie = trayNav.is(':visible') ? "tray-closed=0;" : "tray-closed=1;";
    });
    // EOF: tray
    // BOF: TOC
    let ToC = "<nav role='navigation' class='table-of-contents'>" + "<h2>On this page:</h2>" + "<ul>";
    let newLine, el, title, link, ids = 0;
    $("article h3").each(function () {
        el = $(this);
        title = el.text();
        if (!el.attr("id")) {
            el.attr("id", "toc_" + ++ids);
        }
        link = "#" + el.attr("id");
        newLine = "<li>" + "<a href='" + link + "'>" + title + "</a>" + "</li>";
        ToC += newLine;
    });
    ToC += "</ul>" + "</nav>";

    $(".article-content").prepend(ToC);
    // EOF: TOC

    // form check inline hack
    $('.make-form-check-inline').children('.form-check').addClass('form-check-inline');

    //Tom select
    var tomSelectConfig = {};
    if ($('.tom-select').length) {
        new TomSelect('.tom-select', tomSelectConfig);
    }

});

