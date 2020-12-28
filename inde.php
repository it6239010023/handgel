<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <title>Dashboard</title>
    <style>
        .fa{
        position: relative;
        font-size: 3em;
        width: 100%;
        padding: 5px;
        }

        .fa.float-style>i {
        float: right;
        line-height:26px; 
        }
    </style>

<script>
  
function getDataFromDb()
{
	$.ajax({ 
				url: "stdscan.php" ,
				type: "POST",
				data: ''
			})
			.success(function(result) { 
				var obj = jQuery.parseJSON(result);
					if(obj != '')
					{
						  //$("#myTable tbody tr:not(:first-child)").remove();
						  $("#myBody").empty();
						  $.each(obj, function(key, val) {
									var tr = "<tr>";
									tr = tr + "<td>" + val["studentID"] + "</td>";
									tr = tr + "<td>" + val["fullname"] + "</td>";
									tr = tr + "<td>" + val["record"] + "</td>";
									tr = tr + "<td>" + val["temp"] + "</td>";
									tr = tr + "<td>" + val["st_health"] + "</td>";
									tr = tr + "</tr>";
									$('#myTable > tbody:last').append(tr);
						  });
					}

			});

}

setInterval(getDataFromDb, 1000);   // 1000 = 1 second



</script>

    <body>


    <div class ="container">
        &nbsp;    
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </nav>
    <h1 class="h2">HANDGEL IOT</h1>
    <p>โครงการเครื่องจ่ายเจลอัตโนมัติ : แถบสรุปสถานะทั้งหมด</p>
    
        <div class="row my-4">
                    <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header">ผู้ใช้งานทั้งหมด</h5>
                            <div class="card-body">
                            <div class="fa float-style">
                            <i class="fas fa-users"></i>
                            </div>
                              <h5 class="card-title"><?php echo $data['total'] . " คน"?></h5>
                              <p class="card-text">ภาคเรียนที่ 2/2563</p>
                              <p class="card-text text-success"><?php echo "จำนวนคนวัดอุณหภูมิทั้งหมด " . $data['total'] . " คน"?></p>
                            </div>
                          </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <div class="card">
                            <h5 class="card-header">ความเสี่ยง</h5>
                            <div class="card-body">
                            <div class="fa float-style">
                            <i class="fas fa-head-side-cough"></i>
                            </div>
                              <h5 class="card-title"><?php echo $tata['risk'] . " คน"?></h5>
                              <p class="card-text">ภาคเรียนที่ 2/2563</p>
                              <p class="card-text text-danger"><?php echo "จำนวนคนที่เสี่ยงติดโควิดทั้งหมด " . $tata['risk'] . " คน"?></p>
                            </div>
                          </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <div class="card">
                            <h5 class="card-header">อุณหภูมิปกติ</h5>
                            <div class="card-body">
                            <div class="fa float-style">
                            <i class="fas fa-heartbeat"></i>
                            </div>
                              <h5 class="card-title"><?php echo $fata['fine'] . " คน"?></h5>
                              <p class="card-text">ภาคเรียนที่ 2/2563</p>
                              <p class="card-text text-success"><?php echo "จำนวนคนอุณหภูมิปกติทั้งหมด " . $fata['fine'] . " คน"?></p>
                            </div>
                          </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <div class="card">
                            <h5 class="card-header">อุณหภูมิเฉลี่ย</h5>
                            <div class="card-body">
                            <div class="fa float-style">
                            <i class="fas fa-thermometer-three-quarters"></i>
                            </div>
                              <h5 class="card-title"><?php echo number_format($ata['avgtemp'], 2, ".", ",") . " *C"?></h5>
                              <p class="card-text">ภาคเรียนที่ 2/2563</p>
                              <p class="card-text text-success"><?php echo "อุณหภูมิร่างกายเฉลี่ยทั้งหมด " . number_format($ata['avgtemp'], 2, ".", ",") . " *C"?></p>
                            </div>
                        </div>
                    </div>
                </div>

&nbsp;

    <!-- <div class="col-9 col-md-9 col-lg-9 mb-9 mb-lg-0">
    <div class = "card">
    <h5 class="card-header">นักเรียนที่แจ้งเตือนล่าสุด</h5>
        <div class="card-body">
            <div class="table-responsive"> -->
            <table width="600" border="1" id="myTable">
<!-- head table -->
<thead>
  <tr>
    <td width="91"> <div align="center">studentID </div></td>
    <td width="98"> <div align="center">fullname </div></td>
    <td width="198"> <div align="center">record </div></td>
    <td width="97"> <div align="center">temp </div></td>
    <td width="59"> <div align="center">st_health </div></td>
  </tr>
</thead>
<!-- body dynamic rows -->
<tbody id="myBody">
	
</tbody>
</table>
            <!-- </div>
        </div>
    </div>
    </div>
    </div> -->
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> -->

    <!-- <script>$(document).ready(function() {
    $('#example').DataTable( {
        //"pageLength": 3,
        "paging":   false,
        "ordering": false,
        "info":     false,
        "searching": false,
        "lengthChange": false
    } );
    } );</script> -->
</head>

</html>