// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*';

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';

import Hero from './components/hero';
import Invests from './components/Invests';
import Invest from './components/Invest';
import Menu from './components/menu';


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

  // Example init of scripts
  // remove it when add 1st component
  Hero.init();
  Menu.init();
  Invests.init();
  Invest.init();
});
