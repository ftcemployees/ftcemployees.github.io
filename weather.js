// Docs at http://simpleweatherjs.com
//$(document).ready(function () {
//    $.simpleWeather({
//        location: '83440',
//        woeid: '',
//        unit: 'f',
//        success: function (weather) {
//            var today =
//                '<div>' +
//                '<img src="' + weather.image + '"/>' +
//                '<p>' +
//                'Today' +
//                '<br>' +
//                weather.temp +
//                '&deg;' +
//                weather.units.temp +
//                '<br>' +
//                weather.currently +
//                '</p></div>';
//
//            var tomorrow =
//                '<div>' +
//                '<img src="' + weather.forecast[1].image + '"/>' +
//                '<p>' +
//                'Tomorrow' +
//                '<br>' +
//                weather.forecast[1].high +
//                '&deg;' +
//                weather.units.temp +
//                '<br>' +
//                weather.forecast[1].text +
//                '</p></div>';
//
//            $("#weather").html(today + tomorrow);
//        },
//        error: function (error) {
//            $("#weather").html('<p>' + error + '</p>');
//        }
//    });
//});

$(document).ready(function () {
    getWeather(); //Get the initial weather.
    setInterval(getWeather, 600000); //Update the weather every 10 minutes.
});

function getWeather() {
    $.simpleWeather({
        location: '83440',
        unit: 'f',
        success: function (weather) {
            var today =
                '<div>' +
                '<img src="' + weather.image + '"/>' +
                '<p>' +
                'Today' +
                '<br>' +
                weather.temp +
                '&deg;' +
                weather.units.temp +
                '<br>' +
                weather.currently +
                '</p></div>';

            var tomorrow =
                '<div>' +
                '<img src="' + weather.forecast[1].image + '"/>' +
                '<p>' +
                'Tomorrow' +
                '<br>' +
                weather.forecast[1].high +
                '&deg;' +
                weather.units.temp +
                '<br>' +
                weather.forecast[1].text +
                '</p></div>';

            var datomorrow =
                '<div>' +
                '<img src="live-pics/Tornado.png"' +
                '<p>Day After Tomorrow' +
                '<br>' +
                '200&deg;F' +
                '<br>' +
                'Devastation' +
                '</p></div>';

            $("#weather").html(today + tomorrow + datomorrow);
        },
        error: function (error) {
            $("#weather").html('<p>' + error + '</p>');
        }
    });
}