<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
</head>
<body>

<h2>Search Files</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search..." title="Type in a name">

<table id="myTable">
  <tr class="header">
    <th style="width:10%;">From</th>
    <th style="width:10%;">Type</th>
    <th style="width:20%;">Subject</th>
    <th style="width:45%;">Message</th>
    <th style="width:5%;">Download</th>
    <th style="width:5%;">Edit</th>
    <th style="width:5%;">Delete</th>

  </tr>
  <?php
  include('connect.php');
  $sql = "SELECT * FROM wfile";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()) {
   ?>
  <tr>
    <td style="display: none;"><?php echo $row['wto'].$row['wtype'].$row['wtitle'].$row['wsubject'] ?></td>
    <td><?php echo $row['wto'] ?></td>
    <td><?php echo $row['wtype'] ?></td>
    <td><?php echo $row['wtitle'] ?></td>
    <td><?php echo $row['wsubject'] ?></td>
    <td><a href="file/<?php echo $row['wattachment'] ?>"download><button>Download</button></td>
      <td><a href="fileupdate.php?n1=<?php echo $row['wID'] ?>"><button>Edit</button></td>
    <td><a href="deletefile.php?n1=<?php echo $row['wID'] ?>&n2=<?php echo $row['wattachment'] ?>"><button>Delete</button></td>

  </tr>
  <?php
  }
   ?>
</table>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

</body>
</html>
