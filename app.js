//customize the name to anything 
var surfaceType = "Surface ";
var inchToFeet   = 0.0833;
var feetToMetres = 0.3048;

//custom price per sqm, change to what fits u
var pricePerSqMetre = 12.85;

//tile size in square metres
var tileSizeInSqMetre = 0.05;

$(document).ready(function() {
    
    $('input[name=\'measure_units\']').on('change', function() {

        $('#tileCalc input').val('')
        $('.measure').hide();
        //clear all except first
        $('#measure-' + this.value).find('.btn-primary').html('Add '+surfaceType);
        $('#measure-' + this.value).find('tbody').children().not(':first').remove();;
        $('#measure-' + this.value).show();
        $('#measure-' + this.value).find('.btn-primary').trigger('click');

    });

    $('input[name=\'measure_units\']:checked').trigger('change');

});

$(document).on("click",'#add_row', function() {
    addTabRow('#tab_metres')
})

$(document).on("click",'#add_inch_row', function() {
    addTabRow('#tab_inches')
})

$(document).on("click",'#add_feet_inch', function() {
    addTabRow('#tab_feet_inches')
})

$(document).on("change","input",function(){

    var $parent = $(this).closest("tr")
    var length = 0
    var width = 0

    //width  & length in metres
    length = $parent.find('input[name*="length"]').val()
    width = $parent.find('input[name*="width"]').val()

    //width & length in feet
    var widthFeet = $parent.find('input[name*="feetwid"]').val()
    var lengthFeet = $parent.find('input[name*="feetleng"]').val()

    if (widthFeet) {
       width = convertTo2DP(widthFeet*feetToMetres)
    }

    if (lengthFeet) {
        length = convertTo2DP(lengthFeet*feetToMetres)
    }

    // width and length in feet and inches
    var widthInches = $parent.find('input[name*="inchwidth"]').val()
    var lengthInches = $parent.find('input[name*="inchlength"]').val()

    if (widthInches) { 
        width = parseFloat(width) + convertTo2DP(widthInches*inchToFeet*feetToMetres)
    }

    if (lengthInches) {
        length = parseFloat(length) + convertTo2DP(lengthInches*inchToFeet*feetToMetres)
    }

    //width and length in inch only
    var _inchWidth = $parent.find('input[name*="widinch"]').val()
    var _inchLength = $parent.find('input[name*="leninch"]').val()

    if (_inchWidth) {
        width = convertTo2DP(_inchWidth*inchToFeet*feetToMetres)
    }

    if (_inchLength) {
        length = convertTo2DP(_inchLength*inchToFeet*feetToMetres)
    }

    var _Area =  convertTo2DP(length * width)

    $parent.find('input[name*="area"]').val(_Area); 

    var totalArea = 0;

    var $tbody = $(this).closest("tbody")

    $tbody.find('input[name*="area"]').each(function() {
        totalArea +=  Number($(this).val());
    });

    $("#totalArea").html(convertTo2DP(totalArea)+" sq. m")

    var totalCost = 0;
    totalCost =   convertTo2DP(pricePerSqMetre * totalArea)
    $("#totalCost").html("$ "+totalCost)

    var totalTiles = 0;
    totalTiles =   convertTo2DP(totalArea / tileSizeInSqMetre)
    $("#totalTiles").html(totalTiles+" pcs")
});

/* 
Convert to value to 2 decimal places
*/
function convertTo2DP($value) {
    return  Number(Math.round(($value + Number.EPSILON) * 100) / 100 )
}

function addTabRow(tab) {
    // Get max row id and set new id
    var newid = 0;

    $.each($(tab+' tr'), function() {

        if (parseInt($(this).data("id")) > newid) {
            newid = parseInt($(this).data("id"));
        }
    });
    newid++;
    
    var tr = $("<tr></tr>", {
        id: "addr"+newid,
        "data-id": newid
    });
    
    // loop through each td and create new elements with name of newid
    $.each($(tab+" tbody tr:nth(0) td"), function() {
        var td;
        var current_td = $(this);
        
        var children = current_td.children();
        
        // add new td and element if it has a nane
        if ($(this).data("name") !== undefined) {
            td = $("<td></td>", {
                "data-name": $(current_td).data("name")
            });

            if ($(this).data("name") === 'label') {
                td.html(surfaceType + newid);
            }
            
            var _td_child = $(current_td).find($(children[0]).prop('tagName')).clone().val("");
            _td_child.attr("name", $(current_td).data("name") + newid);
            _td_child.appendTo($(td));
            td.appendTo($(tr));
        } else {
            td = $("<td></td>", {
                'text': $(this).children('tr').length
            }).appendTo($(tr));
        }
    });

    $(tr).appendTo($(tab));
    
    $(tr).find("td button.row-remove").on("click", function() {
            $(this).closest('tr').find("input").val(0);
            $(this).closest('tr').find("input").trigger("change");
            $(this).closest("tr").remove();   
    });
}