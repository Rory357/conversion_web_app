$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function getValueConversion(){

    var fromVal = $("#fromConvertValue").val();
    var fromUnit = $("#fromConvertUnit option:selected" ).val();
    var toVal = $("#toConvertValue").val();
    var toUnit = $("#toConvertUnit option:selected" ).val();

    if((fromVal !== "") && (fromUnit !== "From Unit") && (toUnit !== "To Unit")){
        $.ajax({
            url: "/conversionData",
            type: "POST",
            data: { fromVal : fromVal,fromUnit : fromUnit,toUnit:toUnit},
        }).done(function( msg ) {

            $('#toConvertValue').val(msg);
            
        });
    }
}