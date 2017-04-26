$(document).ready(function () {
    $(".btn").click(function () {
        var form = new FormData();
        form.append("format", "csv2013");
        form.append("surveyId", "SV_aYqEzGrs8v7wOcB");

        var settings = {
            "async": true,
            "crossDomain": true,
            "url": "https://az1.qualtrics.com/API/v3/responseexports",
            "method": "POST",
            "headers": {
                "x-api-token": "TKpaDnheRy2XkdW3QX29UV84nzUCF2ZzNvynZz5A",
                "accept": "*/*",
                "cache-control": "no-cache",
                "postman-token": "682581f4-5351-86ba-5dde-d59938ed5b0b"
            },
            "processData": false,
            "contentType": false,
            "mimeType": "multipart/form-data",
            "data": form
        }

        $.ajax(settings).done(function (response) {
            console.log(response);
        });
    });
});
