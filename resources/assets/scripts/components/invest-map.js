/* eslint-disable */

const loadGoogleMapsApi = require('load-google-maps-api')

const CONFIG = {
    ELEM: '[invest-map]',
};

const InvestMap = {
    init() {
        const { ELEM } = CONFIG;

        this.elem = document.querySelector(ELEM);
        this.markersArray = [];

        console.log('init');
        if (this.elem) {
            this.initMap();
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
        const selectFlag = () => { this.selectFlag() };

        loadGoogleMapsApi().then(function (googleMaps) {
            const map = new googleMaps.Map(elem, {
                center: {
                    lat: Number(elem.dataset.lat),
                    lng: Number(elem.dataset.lng),
                },
                zoom: 11,
            });

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
                    zoom: Number(marker.zoom),
                });

                markersArray.push(flag);
                console.log(flag);

                googleMaps.event.addListener(flag, 'click', function () {
                    map.setZoom(flag.zoom);
                    map.panTo(flag.getPosition());

                    markersArray.forEach((elem) => {
                        elem.setIcon(flag.icon);
                    })

                    flag.setIcon(flag.iconActive);

                    console.log(flag.custom);
                    selectFlag();
                });

            });
        }).catch(function (error) {
            console.error(error)
        });

        this.markersArray = markersArray;
        console.log('this.markersArray', this.markersArray)
    },

    selectFlag() {
        console.log('select-flag');
    },
}

export default InvestMap;