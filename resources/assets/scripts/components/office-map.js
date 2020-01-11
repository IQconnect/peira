/* eslint-disable */

import IsInViewPort from '../util/IsInViewPort';
import mapStyle from '../util/mapStyle';
import 'jquery';

const loadGoogleMapsApi = require('load-google-maps-api')

const CONFIG = {
  ELEM: '[data-office-map]',
};

const officeMap = {
  init() {
    const { ELEM } = CONFIG;

    this.elem = document.querySelector(ELEM);

    this.map;

    console.log('init');
    if (this.elem) {
      this.initMap();
    }
  },

  initMap() {
    const elem = this.elem;
    const markersArray = this.markersArray;
    const myMap = [];

    loadGoogleMapsApi(
      { 'key': 'AIzaSyBP3u_2TC5gJdOQwLSkoZJocoSfN0FM8WM', }
    ).then(function (googleMaps) {

      const json_marker = JSON.parse(elem.dataset.officeMap);

      const map = new googleMaps.Map(elem, {
        center: {
          lat: Number(json_marker.lat),
          lng: Number(json_marker.lng),
        },
        zoom: Number(json_marker.zoom),
        styles: mapStyle,
      });

      const icon = {
        url: json_marker.icon,
      }

      var contentString = `
        <div id="marker-content">
            ${json_marker.name}
        </div>`;

      var infowindow = new googleMaps.InfoWindow({
        content: contentString
      });

      const flag = new googleMaps.Marker({
        position: {
          lat: Number(json_marker.lat),
          lng: Number(json_marker.lng),
        },
        map: map,
        title: json_marker.name,
        icon: icon,
      });

      googleMaps.event.addListener(flag, 'mouseover', function () {
        infowindow.open(map, flag);
      });

      googleMaps.event.addListener(flag, 'mouseout', function () {
        infowindow.close(map, flag);
      });

    }).catch(function (error) {
      console.error(error)
    });

    this.markersArray = markersArray;
    this.map = myMap;
    console.log('map', this.map)
  },
}

export default officeMap;
