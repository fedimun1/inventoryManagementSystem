$(function() {
   $("#itempurchase").change(function() {
   
    if ($("#cash").is(":selected")) {
      $("#cashPayment").show();
      $("#checkPayment").hide();
      $("#borrowPayment").hide();
    }
     else if($("#Check").is(":selected"))
      {
      $("#cashPayment").hide();
      $("#checkPayment").show();
      $("#borrowPayment").hide();
    }
    else if($("#borrow").is(":selected"))
    {
      $("#cashPayment").hide();
      $("#checkPayment").hide();
      $("#borrowPayment").show();
    }
    else
    {
      $("#cashPayment").hide();
      $("#checkPayment").hide();
      $("#borrowPayment").hide();
    }
  }).trigger('change');
 });