/* eslint-disable */

import IsInViewPort from '../util/IsInViewPort';
import 'jquery';

const loadGoogleMapsApi = require('load-google-maps-api')

const CONFIG = {
    ELEM: '[invest-map]',
    TRIGGER: '[data-invest-map-elem]',
    CLASS: '-is-active',
};

const InvestMap = {
    init() {
        const { ELEM, TRIGGER, CLASS } = CONFIG;

        this.elem = document.querySelector(ELEM);
        this.trigger = document.querySelectorAll(TRIGGER);

        this.class = CLASS;

        this.markersArray = [];
        this.map;

        console.log('init');
        if (this.elem) {
            this.initMap();
            this.addEvents();
        }
    },

    initMap() {
        const mapStyle = [
            {
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#f5f5f5"
                    }
                ]
            },
            {
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#616161"
                    }
                ]
            },
            {
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "color": "#f5f5f5"
                    }
                ]
            },
            {
                "featureType": "administrative.land_parcel",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#bdbdbd"
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#eeeeee"
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#757575"
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#e5e5e5"
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#9e9e9e"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#ffffff"
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#757575"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#dadada"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#616161"
                    }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#9e9e9e"
                    }
                ]
            },
            {
                "featureType": "transit.line",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#e5e5e5"
                    }
                ]
            },
            {
                "featureType": "transit.station",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#eeeeee"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#c9c9c9"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#9e9e9e"
                    }
                ]
            }
        ];

        const elem = this.elem;
        const markersArray = this.markersArray;
        const selectFlag = (name) => { this.selectFlag(name) };
        const myMap = [];

        loadGoogleMapsApi().then(function (googleMaps) {
            const map = new googleMaps.Map(elem, {
                center: {
                    lat: Number(elem.dataset.lat),
                    lng: Number(elem.dataset.lng),
                },
                zoom: 11,
            });

            myMap.push(map);

            console.log(elem.dataset.markers);

            const json_markers = JSON.parse(elem.dataset.markers);


            json_markers.forEach(marker => {
                const icon = {
                    url: marker.icon,
                }

                const iconActive = {
                    url: marker.iconActive,
                }

                const flag = new googleMaps.Marker({
                    position: {
                        lat: Number(marker.lat),
                        lng: Number(marker.lng),
                    },
                    map: map,
                    title: marker.name,
                    custom: 'my-custom',
                    icon: icon,
                    iconActive: iconActive,
                    iconInactive: icon,
                    zoom: Number(marker.zoom),
                });

                markersArray.push(flag);
                console.log(flag);

                googleMaps.event.addListener(flag, 'click', function () {
                    selectFlag(flag.title);
                });

            });
        }).catch(function (error) {
            console.error(error)
        });

        this.markersArray = markersArray;
        this.map = myMap;
        console.log('map', this.map)
    },

    selectFlag(name) {

        this.markersArray.forEach(flag => {
            console.log(flag.title, name);

            if (flag.title == name) {
                flag.setIcon(flag.iconActive);
                this.map[0].setZoom(11);
                // this.map[0].setZoom(flag.zoom);
                this.map[0].panTo(flag.getPosition());
            }

            else {
                console.log('remove flag');
                flag.setIcon(flag.iconInactive);
            }
        });

        this.trigger.forEach(elem => {

            if (elem.dataset.investMapElem == name) {
                elem.classList.add(this.class);
                if (IsInViewPort(elem)) {
                    console.log('true');
                }

                else {
                    console.log('false');

                    let top = elem.getBoundingClientRect().y;
                    let offset = -window.innerHeight / 5;
                    if(top < 0) {
                        offset = -200;
                    }

                    top = $(window).scrollTop() + top + offset;

                    console.log('top: ', top, '| height: ', elem.offsetHeight, '| elemTop: ',elem.getBoundingClientRect().top,'| offset: ', offset);
                    const body = $("html, body");
                    body.stop().animate({ scrollTop: top }, 500, 'swing', function () {
                        
                    });
                }
            }

            else {
                //add to current target
                elem.classList.remove(this.class);
            }
        })

    },

    addEvents() {
        this.trigger.forEach((elem) => {
            elem.addEventListener('click', (e) => {
                const $this = e.currentTarget;

                if(window.innerWidth < 993) {
                    window.location = $this.querySelector('.invests-list__button').getAttribute('href');
                }

                else {
                    this.selectFlag($this.dataset.investMapElem);
                }
            })
        })
    },
}

export default InvestMap;