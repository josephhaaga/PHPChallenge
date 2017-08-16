console.log("script");
jQuery(document).ready(function(){
  var date = '';
  var ticker = '';
  jQuery("select.dates").change(function(){
    date = ($("select.dates").val() == "all" ? "" : $("select.dates").val());
    render();
  });
  jQuery("select.tickers").change(function(){
    ticker = ($("select.tickers").val() == "all" ? "" : $("select.tickers").val());
    render();
  });
  function render(){
  	$("table tr").hide();
    date_selector = (date.length > 0 ? ('.'+date) : (''));
    ticker_selector = (ticker.length > 0 ? ('.'+ticker) : (''));
    // console.log("date = "+date_selector);
    // console.log("ticker = "+ticker_selector);
    $("table tr"+date_selector+ticker_selector).show();
  }
});
