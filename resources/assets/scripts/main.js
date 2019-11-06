// import external dependencies
import 'jquery';
import 'jquery-nice-select';

// Import everything from autoload
import './autoload/**/*';

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';

import Hero from './components/hero';
import Invests from './components/invests';
import Invest from './components/invest';
import InvestMap from './components/invest-map';
import Menu from './components/menu';
import SingleNav from './components/single-nav';
import Table from './components/table';
import InvestSlider from './components/invest-slider';
import LocationMap from './components/location-map';


/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
});

// Load Events
jQuery(document).ready(() => {
  routes.loadEvents();
  Hero.init();
  Menu.init();
  Invests.init();
  Invest.init();
  InvestMap.init();
  $('select').niceSelect();
  SingleNav.init();
  Table.init();
  InvestSlider.init();
  LocationMap.init();
});

setTimeout(() => {
  $('.nice-select').on('click', function () {
    console.log('change');
    $(this).addClass('-is-change');
  })
}, 1000)
