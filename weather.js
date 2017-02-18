// Docs at http://simpleweatherjs.com
$(document).ready(function () {
    $.simpleWeather({
        location: '83440',
        woeid: '',
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
                'Tommorow' +
                '<br>' +
                weather.forecast[1].high +
                '&deg;' +
                weather.units.temp +
                '<br>' +
                weather.forecast[1].currently +
                '</p></div>';

            $("#weather").html(today + tomorrow);
        },
        error: function (error) {
            $("#weather").html('<p>' + error + '</p>');
        }
    });
});