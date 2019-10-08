function TakeSnap() {
    Webcam.snap(function (dataUri) {
        document.getElementById('myresult').innerHTML = '<img src="' + dataUri + '"/>';

        var raw_image_data = dataUri.replace(/^data\:image\/\w+\;base64\,/, '');

        document.getElementById('foto').value = raw_image_data;
    });
}

function showCamera(){
  Webcam.reset();
  Webcam.attach('#mycamera');
  document.getElementById("takeSnap").disabled = false;
}

function hideCamera(){
  Webcam.reset();
  document.getElementById("takeSnap").disabled = true;
}

 function submit()
 {
    var medtyre = $('#medpneus').val();
    var foto = $('#foto').val();
    $.ajax(
        {
          type: 'POST',
          url: '/api/submit',
          data: 
          {
            medpneus: medtyre,
            foto: foto,
          },
          success: function(submit)
          {
            $('#myModal').modal('hide');
          },
        });
 }

