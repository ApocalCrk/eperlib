/*=========================================================================================
    File Name: dashboard-analytics.js
    Description: dashboard analytics page content with Apexchart Examples
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(window).on('load', function () {
  'use strict';

  var $gainedChart = document.querySelector('#gained-chart');
  var $orderChart = document.querySelector('#order-chart');
  var $avgSessionsChart = document.querySelector('#avg-sessions-chart');

  var gainedChart;
  var orderChart;
  var avgSessionsChart;
  var isRtl = $('html').attr('data-textdirection') === 'rtl';


  // Average Session Chart
  // ----------------------------------
  avgSessionsChart = new ApexCharts($avgSessionsChart, avgSessionsChartOptions);
  avgSessionsChart.render();

  // Subscribed Gained Chart
  // ----------------------------------
  gainedChart = new ApexCharts($gainedChart, gainedChartOptions);
  gainedChart.render();

  // Order Received Chart
  // ----------------------------------
  orderChart = new ApexCharts($orderChart, orderChartOptions);
  orderChart.render();

});
