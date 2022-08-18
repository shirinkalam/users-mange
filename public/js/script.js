jQuery(function() {
    jQuery('#myTab a:first').tab('show')
  })

  $(".btn-danger").click(function() {
    $('#cust-wrap').animate({
      width: 50 + '%',
      marginLeft: 0
    }, {
      duration: 1000
    });
    $("#cust-table").css("display", "inline-table")
    $("#loc-wrap").fadeIn(2000)
    // $("#loc-table").fadeIn(2000)
    $("#loc-wrap").css("display", "inline-table")
    $("#loc-table").css("display", "inline-table")
  })

  $(".ex").click(function() {
    $("#loc-table").fadeOut(1000)
    $('#cust-wrap').animate({
      width: 100 + '%',
      marginLeft: 0
    }, {
      duration: 1000
    });
    $("#loc-wrap").css("display", "none")
  })
