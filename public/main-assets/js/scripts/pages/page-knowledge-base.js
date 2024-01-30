/*=========================================================================================
    File Name: page-knowledge-base.js
    Description: Knowledge Base Page Script
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
  'use strict';
  var searchbar = $('#searchbar'),
    search_content = $('.kb-search-content-info .kb-search-content'),
    no_result = $('.kb-search-content-info .no-result');

  // Filter for knowledge base and category page
  searchbar.on('keyup', function () {
    var value = $(this).val().toLowerCase();
    if (value != '') {
      $('.book').removeClass('d-none');
      $('.highlight-feature').addClass('d-none');
      search_content.filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      });
      var search_row = $('.kb-search-content-info .kb-search-content:visible').length;

      //Check if search-content has row or not
      if (search_row == 0) {
        no_result.removeClass('no-items');
      } else {
        if (!no_result.hasClass('no-items')) {
          no_result.addClass('no-items');
        }
      }
    } else {
      // If filter box is empty
      $('.book').addClass('d-none');
      no_result.addClass('no-items');
      $('.highlight-feature').removeClass('d-none');
      search_content.show();
    }
  });
});
