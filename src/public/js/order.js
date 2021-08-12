$(document).ready(function(){

    $("#select_customer").css('display','none');
    toggleOrderDetails();
    $(".order-form-footer").css('display','none');

    $("#customer_id").change(function(){
        toggleOrderDetails();
    })
    $(".pkg-radio").click(function(){
        let pkgId = $("input[name='broadbandPackage']:checked").val();
        let cnxfee = $("#"+pkgId+"_cnxfee").val();
        let monthly_payment = $("#"+pkgId+"_monthly_payment").val();
        let initialDeposit = parseFloat(cnxfee) + parseFloat(monthly_payment);
        $("#display_initial_deposit").val(initialDeposit);
    })

    $(".custom-radio").click(function(){
        let pkgId = $("input[name='broadbandPackage']:checked").val();
        let duration = $("input[name='contractDuration']:checked").val();
        let monthly_payment = $("#"+pkgId+"_monthly_payment").val();
        let total_price = parseFloat(monthly_payment) * parseFloat(duration);
        $("#installments").val("£"+ monthly_payment + " x " + duration);
        $("#total_price").val(total_price);
        $(".order-form-footer").css('display','block');
    })

});



function toggleOrderDetails(){
    if($("#customer_id").val() === ""){
        $(".order_details").css('display', 'none');
        return;
    }else{
        $(".order_details").css('display','block');
    }
}



