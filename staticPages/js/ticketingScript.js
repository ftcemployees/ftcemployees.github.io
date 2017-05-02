var data = {
    AppID: 33,
    TypeID: 463,
    Title: "FTC Quick Ticket",
    StatusID: 56,
    RequestorEmail: 0,
    PriorityID: 19,
    Description: 0,
    Attributes: [
        {
            AttributeID: 2121,
            Choices: {
                ChoiceID: 0
            }
        }, {
            AttributeID: 1870,
            Choices: {
                ChoiceID: 0
            }
        }, {
            AttributeID: 1905,
            Choices: {
                ChoiceID: 0
            }
        }, {
            AttributeID: "ddlSource",
            Choices: {
                ChoiceID: 0
            }
        }

    ]

}

var email = "";


$(document).ready(function () {

    $(".drop-down").hide();

    $("#call, #walk-in, #visit, #email").click(function () {
        $("#real_or_nah").show(500);
        data.Attributes[3].Choices.ChoiceID = this.value;
    });

    $("#real").click(function () {
        $("#requestor_type").show(500);
    });

    $("#faculty, #ta, #employee, #student, #other_person").click(function () {
        $("#help_topic").show(500);
        data.Attributes[1].Choices.ChoiceID = this.value;
    });

    $(".listItem, #transfer").click(function () {
        $("#ticket_or_nah").show(500);
        data.Attributes[0].Choices.ChoiceID = this.value;
    });

    $("button").click(function () {
        $(this).toggleClass("clkd");
    });

    $("#dud, #cancel, #close").click(function () {
        /*$(".drop-down").hide(500);
        $("*").removeClass("clkd");*/
        location.reload();
    });

    $("#search").click(function () {
        $("#search-results").remove();
        email = this.value;
        $.ajax({
            type: "GET",
            dataType: "json",
            contentType: "application/json; charset=utf-8",
            url: "",
            data: "{'email':'" + email + "'}",
            success: function (response) {
                var requestors = JSON.parse(response);
                for (var i = 0; i < requestors.length; i++) {
                    var firstName = requestors[i].firstName
                    var lastName = requestors[i].lastName
                    $(".modal-body").append("<p id=\"search-results\">" + firstName + " " + lastName + "&nbsp;<button type=\"button\" class=\"btn btn default\" id=\"select\">Select</button></p>")
                }
            },
            error: function (xhr, textstatus, error) {
                console.log("Error getting requestor!")
            }
        });
    });

    $("#select").click(function () {
        data.RequestorEmail = email;
    });

    $("#submit").click(function () {
        data.Description = $("textarea#description").val();
        console.log(data);
        var myjson = JSON.stringify(data);

        $.ajax({
            type: "GET",
            dataType: "json",
            contentType: "application/json; charset=utf-8",
            url: "",
            data: myjson,
            success: function (response) {
                if (response == true) {
                    console.log("Ticket created!")
                } else {
                    console.log("Error creating ticket!")
                }
            },
            error: function (xhr, textstatus, error) {
                console.log("Error in connectivity!")
            }
        });
        location.reload();
    })

});