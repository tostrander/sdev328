$("#poem").on("click", function() {

    let num = $("#user-input").val();

    $("#result").load("poem.php", { num: num });
    // alert($("#result").html());

    //Change button text to Ouch!
    $("#poem").html("Ouch!");

});