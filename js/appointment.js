function addNewAppointment() {
    let day = document.getElementById('appointmentday').getAttribute('value');
    let timestart = document.getElementById("starttime_item").value;
    let endtime = document.getElementById("endtime_item").value;
    let staff = document.getElementById("staff_item").value;
    let service = document.getElementById("service_item").value;
    let start = day + '' + timestart + ':00:00';
    let end = day + ' ' + endtime + ':00:00';
    let cus = document.getElementById('customer_appointment').value;
    if(timestart == ' ' || endtime == '' || staff=='' || service == ''){
      alert("please choose all the fill");
    }else {
      $.ajax({
        type: "POST",
        url: "pages/appointment/createappointment.php",
        data: {staff: staff,service: service, start: start, end: end,cus:cus}
      }).done(function(data){
        alert(data)
      })
  }
  }
function searchCustomer(){
    let cus = document.getElementById("customer").value;
    $.ajax({
        type: "POST",
        url: "pages/appointment/searchcustomer.php",
        data: {cus: cus}
      }).done(function(data){
        document.getElementById('search_customer').innerHTML=data;
      })
}