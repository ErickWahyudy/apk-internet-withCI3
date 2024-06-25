<?php $this->load->view('template/header'); ?>

<?= $this->session->flashdata('pesan') ?>

<div id="map" style="width: auto; height: 500px;"></div>
    <script type="text/javascript">

        //menampilkan data json dari controller untuk ditampilkan di peta
        var data = <?php echo $data; ?>;
        var tagihan = <?php echo $tagihan; ?>;
        var locations = [];
        
        for (var i = 0; i < data.length; i++) {
          for (var j = 0; j < tagihan.length; j++) {
            if (data[i].nama == tagihan[j].nama) {
              data[i].status = tagihan[j].status;
              break;
            }
          }

        // Ubah format tanggal Indonesia
        var tgl = new Date(data[i].terdaftar_mulai);
        var options = { year: 'numeric', month: 'long', day: 'numeric' };
        var status = data[i].status == 'LS' ? 'Lunas' : 'Belum Lunas';
        var formattedDate = new Intl.DateTimeFormat('id-ID', options).format(tgl);

        locations.push(['<h4>'+data[i].nama+'</h4><p>'+data[i].no_hp+'<br>'+data[i].alamat+'<br> Tgl Daftar : '+formattedDate+'<br><br> Status Tagihan Terakhir : '+status+'</p>',
        data[i].latitude, 
        data[i].longitude]);
        }

         
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 17,
        center: new google.maps.LatLng(-7.951984, 111.430882),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
 
      var infowindow = new google.maps.InfoWindow();
 
      var marker, i;
 
      for (i = 0; i < locations.length; i++) {  
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(locations[i][1], locations[i][2]),
          map: map,
          //jika status lunas bayar maka icon warna hijau, jika tidak maka icon warna merah
          icon: data[i].status == 'LS' ? 'http://maps.google.com/mapfiles/ms/icons/green-dot.png' : 'http://maps.google.com/mapfiles/ms/icons/red-dot.png'
        });
 
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
            infowindow.setContent(locations[i][0]);
            infowindow.open(map, marker);
          }
        })(marker, i));
      }
      
    </script>

<?php $this->load->view('template/footer'); ?>